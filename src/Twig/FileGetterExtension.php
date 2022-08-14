<?php

namespace Eltharin\TwigFilesGetterBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Markup;
use Twig\TwigFunction;
use Eltharin\TwigFilesGetterBundle\Service\FileManager;

class FileGetterExtension extends AbstractExtension
{
	public function getFunctions()
	{
		return [
			new TwigFunction('get_required_css_files', [$this, 'get_required_css_files']),
			new TwigFunction('get_required_js_files', [$this, 'get_required_js_files']),
		];
	}

	public function get_required_css_files($group = ''): string
	{
		return new Markup( FileManager::getRequiredCssFiles($group), 'UTF-8' );
	}

	public function get_required_js_files($group = '')
	{
		return new Markup( FileManager::getRequiredJsFiles($group), 'UTF-8' );
	}
}