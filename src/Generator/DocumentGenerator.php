<?php

namespace Railken\Amethyst\Generator;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class DocumentGenerator
{
    /**
     * @var array
     */
    protected $managers = [];

    /**
     * Generate the documentation.
     *
     * @param string $stubs
     * @param string $destination
     */
    public function generateAll(string $stubs, string $destination)
    {
        foreach (get_declared_classes() as $className) {
            $class = new \ReflectionClass($className);

            if ($class->implementsInterface(\Railken\Lem\Contracts\ManagerContract::class) && !$class->isAbstract()) {
                $manager = new $className();
                echo $class."\n";
                $this->manager('test', $className, $manager->retrieveClasses()['faker']);
            }
        }

        $this->generateFile($stubs.'/index.md', $destination.'/index.md', [
            'managers' => $this->managers,
        ]);

        foreach ($this->managers as $manager) {
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($stubs.'/entity/')) as $filename) {
                if (is_file($filename)) {
                    $filename = basename($filename);

                    $this->generateFile($stubs.'/entity/'.$filename, $destination.'/entity/'.$manager['instance']->getName().'/'.$filename, [
                        'manager' => $manager,
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
     * Add a manager.
     *
     * @param string $class
     * @param string $faker
     */
    public function manager(string $package, string $class, string $faker)
    {
        $instance = new $class();

        $errors = array_values($instance->getExceptions());

        foreach ($instance->getAttributes() as $attribute) {
            $errors = array_merge($errors, array_values($attribute->getExceptions()));
        }

        $errors = array_map(function ($v) {
            return new $v();
        }, $errors);

        $permissions = array_values($instance->getAuthorizer()->getPermissions());

        foreach ($instance->getAttributes() as $attribute) {
            $permissions = array_merge($permissions, array_values($attribute->getPermissions()));
        }

        $this->managers[$class] = [
            'package'				            => $package,
            'class'                  => $class,
            'entity'                 => $instance->newEntity(),
            'instance_shortname'     => (new \ReflectionClass($instance))->getShortName(),
            'instance'	              => $instance,
            'errors' 	               => $errors,
            'permissions'	           => $permissions,
            'faker'                  => $faker,
            'parameters'             => $faker::make()->parameters()->toArray(),
            'parameters_formatted'   => $this->var_export54($faker::make()->parameters()->toArray()),
        ];
    }
}
