<?php

/* academicoBundle:Default:requisitoestudiante.html.twig */
class __TwigTemplate_26cdb3cdc38605bc39d6a6ef20dd54e51296e37e53689b40e838e9c914338f94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'id' => array($this, 'block_id'),
            'title' => array($this, 'block_title'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_id($context, array $blocks = array())
    {
        echo "estudiante";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Requisito del estudiante";
    }

    // line 7
    public function block_article($context, array $blocks = array())
    {
        // line 8
        echo "
<h1>";
        // line 9
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["estudiante"]) ? $context["estudiante"] : $this->getContext($context, "estudiante")), "nombre"), "html", null, true);
        echo "



";
    }

    // line 17
    public function block_aside($context, array $blocks = array())
    {
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:requisitoestudiante.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 18,  63 => 17,  54 => 11,  49 => 9,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
