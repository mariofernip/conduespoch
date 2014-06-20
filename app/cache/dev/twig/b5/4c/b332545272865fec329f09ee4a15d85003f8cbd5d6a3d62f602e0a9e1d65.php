<?php

/* ::frontend.html.twig */
class __TwigTemplate_b54cb332545272865fec329f09ee4a15d85003f8cbd5d6a3d62f602e0a9e1d65 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 4
    public function block_javascripts($context, array $blocks = array())
    {
        // line 5
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/academico/css/normalizar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/academico/css/comun.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/academico/css/frontend.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "    <header>
        <h1><a href=\"#\">ACADÉMICO</a></h1>
        <nav>
            <ul>
                <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("_portada");
        echo "\">Inscripciones</a></li>
                <li><a href=\"#\">Matriculas</a></li>
                <li><a href=\"#\">Mis ofertas</a></li>                
            </ul>
        </nav>
    </header>

    <article class=\"oferta\">
        ";
        // line 23
        $this->displayBlock('article', $context, $blocks);
        // line 24
        echo "    </article>

    <aside>
        ";
        // line 27
        $this->displayBlock('aside', $context, $blocks);
        // line 31
        echo "            
     </aside>
";
    }

    // line 23
    public function block_article($context, array $blocks = array())
    {
    }

    // line 27
    public function block_aside($context, array $blocks = array())
    {
        // line 28
        echo "            
            
        ";
    }

    public function getTemplateName()
    {
        return "::frontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 28,  95 => 27,  90 => 23,  84 => 31,  82 => 27,  77 => 24,  75 => 23,  64 => 15,  58 => 11,  55 => 10,  49 => 7,  40 => 5,  37 => 4,  32 => 3,  50 => 9,  45 => 6,  42 => 5,  36 => 4,  30 => 3,);
    }
}
