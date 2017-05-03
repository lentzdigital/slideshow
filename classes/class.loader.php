<?php
if(!defined('WPINC')) die;

class Loader
{
	protected $actions;
	protected $filters;

	public function __construct()
	{
		$this->actions = [];
		$this->filters = [];
	}

	public function addAction($hook, $component, $callback)
	{
		$this->actions = $this->add($this->actions, $hook, $component, $callback);
	}

	public function addFilter($hook, $component, $callback)
	{
		$this->filters = $this->add($this->filters, $hook, $component, $callback);
	}

	public function init()
	{
		foreach($this->filters as $hook)
		{
			add_filter($hook['hook'], [$hook['component'], $hook['callback']]);
		}

		foreach($this->actions as $hook)
		{
			add_filter($hook['hook'], [$hook['component'], $hook['callback']]);
		}
	}

	private function add($hooks, $hook, $component, $callback)
	{
		$hooks[] = [
			'hook'      => $hook,
			'component' => $component,
			'callback'  => $callback,
		];

		return $hooks;
	}
}