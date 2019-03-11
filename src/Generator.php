<?php

namespace Railken\Amethyst\Documentation;

use Eloquent\Composer\Configuration\ConfigurationReader;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Michelf\Markdown;
use Railken\Lem\Tokens;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Generator
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Generate the documentation.
     *
     * @param string $stubs
     */
    public function generate(string $destination)
    {
        $composerReader = new ConfigurationReader();
        $composer = $composerReader->read(getcwd().'/composer.json');

        $packageName = isset($composer->extra()->amethyst) ? $composer->extra()->amethyst->package : null;

        $configs = $packageName ? [$packageName] : array_keys(Config::get('amethyst'));

        foreach ($configs as $config) {
            foreach (Config::get('amethyst.'.$config.'.data', []) as $nameData => $data) {
                if (Arr::get($data, 'manager')) {
                    $this->addData($config, $nameData, $data);
                }
            }
        }

        $common = [
            'composer' => $composer,
        ];

        $this->generateFiles(__DIR__.'/../stubs/library', $destination, array_merge($common, [
            'data' => $this->data,
        ]));

        foreach ($this->data as $data) {
            $this->generateFiles(__DIR__.'/../stubs/entity', $destination.'/entity/'.Arr::get($data, 'manager')->getName(), array_merge($common, [
                'data' => $data,
            ]));
        }
    }

    public function generateFiles(string $source, string $destination, array $data = [])
    {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source)) as $filename) {
            if (is_file($filename)) {
                $to = $destination.str_replace($source, '', $filename);

                $content = file_get_contents($filename);

                $content = $this->parseContent((string) $content, $data);

                if (!file_exists(dirname($to))) {
                    mkdir(dirname($to), 0755, true);
                }

                file_put_contents($to, $content);
            }
        }
    }

    /**
     * Parse content.
     *
     * @param string $content
     *
     * @return string
     */
    public function parseContent(string $content, array $data = []): string
    {
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        return $twig->render($content, $data);
    }

    public function var_export54($var, $indent = '')
    {
        switch (gettype($var)) {
            case 'string':
                return '"'.addcslashes($var, "\\\$\"\r\n\t\v\f").'"';
            case 'array':
                $indexed = array_keys($var) === range(0, count($var) - 1);
                $r = [];
                foreach ($var as $key => $value) {
                    $r[] = "$indent    "
                         .($indexed ? '' : $this->var_export54($key).' => ')
                         .$this->var_export54($value, "$indent    ");
                }

                return "[\n".implode(",\n", $r)."\n".$indent.']';
            case 'boolean':
                return $var ? 'TRUE' : 'FALSE';
            default:
                return var_export($var, true);
        }
    }

    /**
     * Add a data.
     *
     * @param string $package
     * @param string $name
     * @param array  $data
     */
    public function addData(string $package, string $name, array $data)
    {
        $classManager = Arr::get($data, 'manager');
        $faker = Arr::get($data, 'faker');
        $className = basename(str_replace('\\', '/', Arr::get($data, 'model')));

        $manager = new $classManager();
        $entity = $manager->newEntity();

        $errors = [];

        foreach ($manager->getAttributes() as $attribute) {
            foreach ($attribute->getExceptions() as $code => $exception) {
                if ($code === Tokens::NOT_DEFINED) {
                    if ($attribute->getRequired()) {
                        $errors[] = $attribute->newException($code, null);
                    }
                } elseif ($code === Tokens::NOT_UNIQUE) {
                    if ($attribute->getUnique()) {
                        $errors[] = $attribute->newException($code, null);
                    }
                } elseif ($code === Tokens::NOT_VALID) {
                    if ($attribute->getFillable()) {
                        $errors[] = $attribute->newException($code, null);
                    }
                } elseif ($code === Tokens::NOT_AUTHORIZED) {
                    if ($attribute->getFillable()) {
                        $errors[] = $attribute->newException($code, null);
                    }
                } else {
                    $errors[] = $attribute->newException($code, null);
                }
            }
        }

        $permissions = array_values($manager->getAuthorizer()->getPermissions());

        foreach ($manager->getAttributes() as $attribute) {
            $permissions = array_merge($permissions, array_values($attribute->getPermissions()));
        }

        $this->data[$className] = [
            'className'            => $className,
            'name'                 => $name,
            'components'           => $data,
            'package'              => $package,
            'manager'              => $manager,
            'entity'               => $entity,
            'instance_shortname'   => (new \ReflectionClass($manager))->getShortName(),
            'errors'               => $errors,
            'permissions'          => $permissions,
            'parameters'           => $faker::make()->parameters()->toArray(),
            'parameters_formatted' => $this->var_export54($faker::make()->parameters()->toArray()),
        ];
    }

    public function write($filename, $content)
    {
        if (!file_exists(dirname($filename))) {
            mkdir(dirname($filename), 0755, true);
        }

        file_put_contents($filename, $content);
    }

    /**
     * @param string $source
     * @param string $destination
     */
    public function publishable(string $source, string $destination)
    {
        $docs = [];

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source)) as $filename) {
            if (is_file($filename)) {
                $destinationFile = $destination.str_replace($source, '', $filename);

                $destinationFile = dirname($destinationFile).'/'.pathinfo($destinationFile, PATHINFO_FILENAME).'.html';

                $content = str_replace('.md', '.html', file_get_contents($filename));

                $docs[(string) $filename] = $docs;
                // $this->write($destinationFile, Markdown::defaultTransform($content));
            }
        }

        $composerReader = new ConfigurationReader();
        $composer = $composerReader->read(getcwd().'/composer.json');

        $this->generateFiles(__DIR__.'/../stubs/publishable', $destination, array_merge([
            'docs'     => $docs,
            'composer' => $composer,
        ]));
    }
}
