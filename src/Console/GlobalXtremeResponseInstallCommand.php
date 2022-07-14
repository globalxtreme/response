<?php

namespace GlobalXtreme\Response\Console;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'globalxtreme:response-install')]
class GlobalXtremeResponseInstallCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'globalxtreme:response-install';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     *
     * @deprecated
     */
    protected static $defaultName = 'globalxtreme:response-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new parser class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Response component';

    /**
     * This stub is for installation
     *
     * @var string
     */
    protected $stubFile;

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $stubs = [
            'gx.error.stub' => 'Constant/Error',
            'gx.success.stub' => 'Constant/Success',
            'gx.responses.stub' => 'Status/globals'
        ];
        foreach ($stubs as $key => $stub) {

            $this->stubFile = $key;

            $name = $this->qualifyClass($stubs[$key]);

            $path = $this->getPath($name);

            // Next, we will generate the path to the location where this class' file should get
            // written. Then, we will build the class and make the proper replacements on the
            // stub files so that it gets the correctly formatted namespace and class name.
            $this->makeDirectory($path);

            $this->files->put($path, $this->sortImports($this->buildClass($name)));

            if (in_array(CreatesMatchingTest::class, class_uses_recursive($this))) {
                $this->handleTestCreation($path);
            }

        }

        $this->info($this->type . ' installed successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/' . $this->stubFile);
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Packages\Response';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}
