<?php

namespace Eltharin\TwigFilesGetterBundle\Service;

class FileManager
{
	static private $data = ['cssFiles' => [],'jsFiles' => [] ];

	public static function registerCssFile(string $file, string $group = ''): void
	{
		self::$data['cssFiles'][$group][$file] = $file;
	}

	public static function registerJsFile(string $file, string $group = ''): void
	{
		self::$data['jsFiles'][$group][$file] = $file;
	}

	public static function getRequiredCssFiles(string $group = ''): string
	{
		return implode("\r\n", array_map(fn($a) => '<link rel="stylesheet" type="text/css" href="' . $a . '">',self::$data['cssFiles'][$group] ?? []));
	}

	public static function getRequiredJsFiles(string $group = ''): string
	{
		return implode("\r\n", array_map(fn($a) => '<script src="' . $a . '"/></script>',self::$data['jsFiles'][$group] ?? []));
	}
}