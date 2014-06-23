<?php

/* ::base.html.twig */
class __TwigTemplate_a82aa4ad457e63a376f69ac0c72d05f1914f5fd1f19e49a2a65b4eed47afae19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'id' => array($this, 'block_id'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo " | ACADÉMICO</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body id=\"";
        // line 9
        $this->displayBlock('id', $context, $blocks);
        echo " \">
        <div id=\"contenedor\">
        ";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "            <footer>
                &copy;  ";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - Cupon <br>
                <a href=\"#\"> Ayuda </a> 
                <a href=\"#\"> Contacto </a>
                <a href=\"#\"> Privacidad </a>
                <a href=\"#\"> Sobre nosotros </a>
            </footer>
        ";
        // line 19
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "        </div>></body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 9
    public function block_id($context, array $blocks = array())
    {
        echo "";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 11,  79 => 9,  74 => 6,  69 => 5,  63 => 20,  61 => 19,  52 => 13,  47 => 11,  34 => 6,  24 => 1,  98 => 28,  95 => 27,  90 => 19,  84 => 31,  82 => 27,  77 => 24,  75 => 23,  64 => 15,  58 => 11,  55 => 10,  49 => 12,  40 => 5,  37 => 4,  32 => 3,  50 => 9,  45 => 6,  42 => 9,  36 => 7,  30 => 5,);
    }
}
