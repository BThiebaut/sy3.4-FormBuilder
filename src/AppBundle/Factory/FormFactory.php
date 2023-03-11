<?php

namespace AppBundle\Factory;

use AppBundle\Form\Model\AbstractFieldModel;

class FormFactory {

    private static $instance;

    const appRoot = __DIR__ . "/../../../";
    const modelNameSpace = "AppBundle\\Form\\Model";

    /**
     * Get FormFactory instance
     * @return self
     */
    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new FormFactory();
        }

        return self::$instance;
    }

    /**
     * Return a list of possibles form models
     * @return array
     */
    public function getModels(){
        $nameSpaceDir = $this->getNamespaceDirectory(self::modelNameSpace);
        $files = scandir($nameSpaceDir);

        $classes = array_map(function($file) {
            return self::modelNameSpace . '\\' . str_replace('.php', '', $file);
        }, $files);

        $models = array_filter($classes, function($possibleClass){
            return class_exists($possibleClass) && $possibleClass !== AbstractFieldModel::class;
        });

        return $models;
    }

    /**
     * Get all models config array ['className' => 'displayName']
     * @return array
     */
    public function getModelsConfig()
    {
        $models = $this->getModels();
        $config = [];
        foreach($models as $model){
            $config[$model] = $model::getName();
        }

        return $config;
    }

    private function getDefinedNamespaces()
    {
        $composerJsonPath = self::appRoot . 'composer.json';
        $composerConfig = json_decode(file_get_contents($composerJsonPath));

        return (array) $composerConfig->autoload->{'psr-4'};
    }

    private function getNamespaceDirectory($namespace)
    {
        $composerNamespaces = self::getDefinedNamespaces();

        $namespaceFragments = explode('\\', $namespace);
        $undefinedNamespaceFragments = [];

        while($namespaceFragments) {
            $possibleNamespace = implode('\\', $namespaceFragments) . '\\';
            if(array_key_exists($possibleNamespace, $composerNamespaces)){
                return realpath(self::appRoot . $composerNamespaces[$possibleNamespace] . '/' . implode('/', $undefinedNamespaceFragments));
            }

            array_unshift($undefinedNamespaceFragments, array_pop($namespaceFragments));            
        }

        return false;
    }
}