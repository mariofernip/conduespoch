<?php

/* academicoBundle:Default:portada.html.twig */
class __TwigTemplate_e0940848b949ce69a3bfb165e0757c714ddc1f46a4511fa8fdd3f22db17b116d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'article' => array($this, 'block_article'),
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
    public function block_title($context, array $blocks = array())
    {
        echo " INICIO ";
    }

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 5
    public function block_article($context, array $blocks = array())
    {
        // line 6
        echo "<strong><legend>Enlaces de interes</legend></strong>
<strong>
    <ul>
        <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("estudiante_registro");
        echo "\">Registrar estudiante</a></li>
        
    </ul>
</strong>



";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:portada.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  45 => 6,  42 => 5,  36 => 4,  30 => 3,);
    }
}
