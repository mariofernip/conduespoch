<?php

/* academicoBundle:Default:registroestudiante.html.twig */
class __TwigTemplate_6e49de65147bc46253700c2370e88ca00a753c939a36217cc3cde5f6bb24e003 extends Twig_Template
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
        echo "Registro de un nuevo estudiante";
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
        echo $this->env->getExtension('routing')->getPath("estudiante_registro");
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'label', array("label" => "Número de cédula:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'widget');
        echo "
                  ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre"), 'row');
        echo "                       
                  ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellido"), 'row');
        echo "
                  ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'label', array("label" => "Teléfono fijo"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'widget');
        echo "
                  ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "celular"), 'row');
        echo "
                  ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "calle"), 'row');
        echo "
                  ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "barrio"), 'row');
        echo "
                  ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "parroquia"), 'row');
        echo "
                  ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "ciudad"), 'row');
        echo "
                  ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'label', array("label" => "Correo"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'widget');
        echo "
                  ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "ocupacion"), 'row');
        echo "
                  ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "lugarnacimiento"), 'label', array("label" => "Lugar de nacimiento"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "lugarnacimiento"), 'widget');
        echo "

              
              </fieldset>   
         ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
          </form>





";
    }

    // line 40
    public function block_aside($context, array $blocks = array())
    {
        // line 41
        echo "
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:registroestudiante.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 41,  136 => 40,  123 => 30,  115 => 26,  111 => 25,  106 => 24,  102 => 23,  98 => 22,  94 => 21,  90 => 20,  86 => 19,  81 => 18,  77 => 17,  73 => 16,  68 => 15,  63 => 13,  59 => 12,  56 => 11,  51 => 9,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
