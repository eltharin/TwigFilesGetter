<?php

namespace Eltharin\TwigFilesGetterBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Markup;
use Twig\TwigFunction;
use Eltharin\TwigFilesGetterBundle\Service\FileManager;

class FileGetterExtension extends AbstractExtension
{
	public function getFunctions() :array
	{
		return [
			new TwigFunction('getCss', [$this, 'get_required_css_files']),
			new TwigFunction('getJs', [$this, 'get_required_js_files']),
			new TwigFunction('addCss', [$this, 'add_required_css_files']),
			new TwigFunction('addJs', [$this, 'add_required_js_files']),
		];
	}

	public function add_required_css_files($file, $group = '')
	{
		FileManager::registerCssFile($file, $group);
	}

	public function get_required_css_files($group = '')
	{
		return new Markup( FileManager::getRequiredCssFiles($group), 'UTF-8' );
	}

	public function add_required_js_files($file, $group = '')
	{
		FileManager::registerJsFile($file, $group);
	}

	public function get_required_js_files($group = '')
	{
		return new Markup( FileManager::getRequiredJsFiles($group), 'UTF-8' );
	}
}
