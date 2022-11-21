Symfony TwigFilesGetter Bundle
==========================

[![Latest Stable Version](http://poser.pugx.org/eltharin/twigfilesgetter/v)](https://packagist.org/packages/eltharin/twigfilesgetter) 
[![Total Downloads](http://poser.pugx.org/eltharin/twigfilesgetter/downloads)](https://packagist.org/packages/eltharin/twigfilesgetter) 
[![Latest Unstable Version](http://poser.pugx.org/eltharin/twigfilesgetter/v/unstable)](https://packagist.org/packages/eltharin/twigfilesgetter) 
[![License](http://poser.pugx.org/eltharin/twigfilesgetter/license)](https://packagist.org/packages/eltharin/twigfilesgetter)


Installation
------------

* Require the bundle with composer:

``` bash
composer require eltharin/twigfilesgetter
```


What is TwigFilesGetter Bundle?
---------------------------
This bundle will help you to include css and js files once in your template.

Per example, when you make a Custom FormType who need a script, you can put in the buildView function the lines :  

``` php
use Eltharin\TwigFilesGetterBundle\Service\FileManager;

...

public function buildView(FormView $view, FormInterface $form, array $options)
{
    FileManager::registerJsFile('/bundles/eltharinreloadablefield/js/reloader.js');
    ...
}
```

or in a twig template : 

``` twig

{% do addJs('fichier.js') %} 

or

{% do addCss('fichier.css') %}

or with a group : 

{% do addJs('fichier.js', 'group Name') %}

```


and in your template : 

```
{{ get_required_js_files() }}
```

will write

```
<script src="/bundles/eltharincommonassets/js/scripts.js"/></script>
```


if you want have js in head and after the page you can specify a 'group'

```
public function buildView(FormView $view, FormInterface $form, array $options)
{
    FileManager::registerJsFile('/bundles/eltharinreloadablefield/js/file_in_head.js', 'head');
    FileManager::registerJsFile('/bundles/eltharinreloadablefield/js/file_bottom.js', 'bottom');
    ...
}
```

and in your template : 

```
in head : 

{{ get_required_js_files('head') }}

and 

{{ get_required_js_files('bottom') }}

```
