<?php

namespace Railken\Amethyst\Generator;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class DocumentGenerator
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Generate the documentation.
     *
     * @param string $stubs
     * @param string $destination
     */
    public function generateAll(string $stubs, string $destination)
    {
        // Use config to retrieve all datas

        foreach (Config::get('amethyst') as $name => $package) {
            foreach ((array) Arr::get($package, 'data') as $data) {
                $this->addData($name, $data);
            }
        }

        $this->generateFile($stubs.'/index.md', $destination.'/index.md', [
            'data' => $this->data,
        ]);
        $this->generateFile($stubs.'/installation.md', $destination.'/installation.md');

        foreach ($this->data as $data) {
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($stubs.'/entity/')) as $filename) {
                if (is_file($filename)) {
                    $filename = basename($filename);

                    $this->generateFile($stubs.'/entity/'.$filename, $destination.'/entity/'.Arr::get($data, 'manager')->getName().'/'.$filename, [
                        'data' => $data,
                    ]);
                }
            }
        }
    }

    public function generateFile(string $source, string $destination, array $data = [])
    {
        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0755, true);
        }

        $content = file_get_contents($source);

        $content = $this->parseContent((string) $content, $data);

        file_put_contents($destination, $content);
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
     * @param array  $data
     */
    public function addData(string $package, array $data)
    {
        $classManager = Arr::get($data, 'manager');
        $faker = Arr::get($data, 'faker');

        $manager = new $classManager();
        $entity = $manager->newEntity();

        $errors = array_values($manager->getExceptions());

        foreach ($manager->getAttributes() as $attribute) {
            $errors = array_merge($errors, array_values($attribute->getExceptions()));
        }

        $errors = array_map(function ($v) {
            return new $v();
        }, $errors);

        $permissions = array_values($manager->getAuthorizer()->getPermissions());

        foreach ($manager->getAttributes() as $attribute) {
            $permissions = array_merge($permissions, array_values($attribute->getPermissions()));
        }

        $this->data[Arr::get($data, 'model')] = [
            'components'             => $data,
            'package'				            => $package,
            'manager'                => $manager,
            'entity'                 => $entity,
            'instance_shortname'     => (new \ReflectionClass($manager))->getShortName(),
            'errors' 	               => $errors,
            'permissions'	           => $permissions,
            'parameters'             => $faker::make()->parameters()->toArray(),
            'parameters_formatted'   => $this->var_export54($faker::make()->parameters()->toArray()),
        ];
    }
}
