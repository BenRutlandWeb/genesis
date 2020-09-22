<?php

namespace Genesis\Console;

use Genesis\Contracts\Application;
use WP_CLI;

abstract class Command
{
    /**
     * The arguments.
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Construct the command.
     */
    public function __construct()
    {
        # code...
    }

    /**
     * Return the command name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Parse the command arguments and trigger the handle method.
     *
     * @param array $args    The arguments from the console.
     * @param array $options The options passed from the console.
     *
     * @return void
     */
    public function __invoke(array $args, array $options): void
    {
        $this->arguments = $this->parseArguments($args);
        $this->options = $options;

        $this->handle();
    }

    /**
     * Return the arguments with a name.
     *
     * @param  array  $args   The arguments from the console.
     * @param  array  $flags  The flags and options passed from the console.
     *
     * @return array
     */
    protected function parseArguments(array $args): array
    {
        $options = $this->getArguments();

        return array_combine(
            array_intersect_key($options, $args),
            array_intersect_key($args, $options)
        );
    }

    /**
     * Check if the argument exists
     *
     * @param string $key
     *
     * @return boolean
     */
    public function hasArgument(string $key): bool
    {
        return isset($this->arguments[$key]);
    }

    /**
     * Get the argument.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function argument(string $key)
    {
        return $this->arguments[$key];
    }

    /**
     * Check if the option exists
     *
     * @param string $key
     *
     * @return boolean
     */
    public function hasOption(string $key): bool
    {
        return isset($this->options[$key]);
    }

    /**
     * Get the option.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function option(string $key)
    {
        return $this->options[$key];
    }

    /**
     * Set the app instance.
     *
     * @param \Genesis\Contracts\Application $app
     *
     * @return self
     */
    public function setInstance(Application $app): self
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Return a success message.
     *
     * @param string $message
     *
     * @return void
     */
    public function success(string $message): void
    {
        WP_CLI::success($message);
    }

    /**
     * Return an error message.
     *
     * @param string $message
     * @return void
     */
    public function error(string $message): void
    {
        WP_CLI::error($message);
    }

    /**
     * Add the command to the CLI.
     *
     * @return void
     */
    public function add(): void
    {
        WP_CLI::add_command($this->getName(), $this);
    }

    /**
     * Handle the command.
     *
     * @return void
     */
    abstract protected function handle(): void;

    /**
     * Return an array of allowed arguments in the order they are expected.
     *
     * @return array
     */
    abstract protected function getArguments(): array;
}
