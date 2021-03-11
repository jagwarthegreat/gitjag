<?php

/**
 * Simple Git wrapper for php
 * 
 */
class Git
{

	public function __construct()
	{
		// $this->add      = new Command\AddCommand($this);
		// $this->archive  = new Command\ArchiveCommand($this);
		// $this->branch   = new Command\BranchCommand($this);
		// $this->cat      = new Command\CatCommand($this);
		// $this->checkout = new Command\CheckoutCommand($this);
		// $this->clone    = new Command\CloneCommand($this);
		// $this->commit   = new Command\CommitCommand($this);
		// $this->config   = new Command\ConfigCommand($this);
		// $this->describe = new Command\DescribeCommand($this);
		// $this->fetch    = new Command\FetchCommand($this);
		// $this->init     = new Command\InitCommand($this);
		// $this->log      = new Command\LogCommand($this);
		// $this->merge    = new Command\MergeCommand($this);
		// $this->mv       = new Command\MvCommand($this);
		// $this->pull     = new Command\PullCommand($this);
		// $this->push     = new Command\PushCommand($this);
		// $this->rebase   = new Command\RebaseCommand($this);
		// $this->remote   = new Command\RemoteCommand($this);
		// $this->reset    = new Command\ResetCommand($this);
		// $this->rm       = new Command\RmCommand($this);
		// $this->shortlog = new Command\ShortlogCommand($this);
		// $this->show     = new Command\ShowCommand($this);
		// $this->stash    = new Command\StashCommand($this);
		// $this->status   = new Command\StatusCommand($this);
		// $this->tag      = new Command\TagCommand($this);
		// $this->tree     = new Command\TreeCommand($this);

		$this->git = 'git ';
	}

	/**
	 * This will execute the command supplied
	 * 
	 */
	public function runCommand($command, $outputType = 'out')
	{
		$out = null;
		$retVal = null;
		exec($command, $out, $retVal);

		return ($outputType == "out") ? $out : $retVal;
	}

	/**
	 * Initialize this directory as a git repo
	 * 
	 */
	public function init()
	{
		$command = $this->git . "init";
		$output = $this->runCommand($command);

		return $output;
	}

	/**
	 * Get the list of git tags
	 * 
	 */
	public function tag($listType = 'all')
	{
		$command = $this->git . 'tag';
		$output = $this->runCommand($command);

		return ($listType == 'all') ? $output : end($output);
	}

	public function fetch($origin = "", $branch = "")
	{
		$command = $this->git . "fetch $origin $branch";
		$output = $this->runCommand($command);

		return $output;
	}

	public function pull($origin = "", $branch = "")
	{
		$command = $this->git . "pull $origin $branch";
		$output = $this->runCommand($command);

		return $output;
	}

	public function branch($option = "")
	{
		$command = $this->git . "branch $option";
		$output = $this->runCommand($command);

		return $output;
	}

	public function checkout($option = "", $branch = "")
	{
		$command = $this->git . "checkout $option $branch";
		$output = $this->runCommand($command);

		return $output;
	}

	public function cloneRepo($option = "", $branch = "", $repo = "")
	{
		$command = $this->git . "clone $option $branch $repo";
		$output = $this->runCommand($command);

		return $output;
	}

	public function commit($message = "")
	{
		$commitMessage = ($message == "") ? "" : "-m $message";
		$command = $this->git . "commit $commitMessage";
		$output = $this->runCommand($command);

		return $output;
	}
}
