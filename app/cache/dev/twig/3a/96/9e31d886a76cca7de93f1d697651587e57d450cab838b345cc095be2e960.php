<?php

/* academicoBundle:Default:matriculaestudiante.html.twig */
class __TwigTemplate_3a969e31d886a76cca7de93f1d697651587e57d450cab838b345cc095be2e960 extends Twig_Template
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
        echo "Matricula de un nuevo estudiante";
    }

    // line 7
    public function block_article($context, array $blocks = array())
    {
        // line 8
        echo "<h1>PERIODO ACADÉMICO ACTUAL ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "nombre"), "html", null, true);
        echo "</h1><br><br>
<h1>";
        // line 9
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

<form action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("estudiante_matricula");
        echo "\" method=\"post\" ";
        echo         // line 12
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'enctype');
        echo ">
          ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'errors');
        echo "
          <fieldset>
                  ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "periodo"), 'row');
        echo "
                  ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nivel"), 'row');
        echo "
                  ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "seccion"), 'label', array("label" => "Seccion de estudio:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "seccion"), 'widget');
        echo "                                                        
                  ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estudiante"), 'row');
        echo "
                  ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "observaciones"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "
                  
              </fieldset>   
         ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Matricular\" />
          </form>





";
    }

    // line 32
    public function block_aside($context, array $blocks = array())
    {
        // line 33
        echo "<section id=\"login\">
                ";
        // line 34
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("academicoBundle:Default:cajaLogin"));
        echo "
            </section>            
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:matriculaestudiante.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 34,  107 => 33,  104 => 32,  91 => 22,  85 => 19,  81 => 18,  76 => 17,  72 => 16,  68 => 15,  63 => 13,  59 => 12,  56 => 11,  51 => 9,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
