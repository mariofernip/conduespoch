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
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
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
        return array (  104 => 32,  76 => 17,  90 => 19,  34 => 6,  97 => 24,  84 => 25,  81 => 18,  58 => 11,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 33,  61 => 19,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 28,  71 => 16,  67 => 15,  63 => 13,  59 => 12,  38 => 6,  94 => 28,  89 => 28,  85 => 19,  75 => 17,  68 => 15,  56 => 11,  87 => 25,  21 => 2,  26 => 6,  93 => 28,  88 => 6,  78 => 24,  46 => 8,  27 => 4,  44 => 12,  31 => 3,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 22,  62 => 14,  49 => 12,  24 => 1,  25 => 3,  19 => 1,  79 => 9,  72 => 16,  69 => 5,  47 => 11,  40 => 5,  37 => 5,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 32,  120 => 31,  115 => 28,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 26,  83 => 25,  74 => 6,  66 => 15,  55 => 10,  52 => 13,  50 => 10,  43 => 7,  41 => 7,  35 => 5,  32 => 3,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 31,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 25,  86 => 28,  82 => 24,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 9,  48 => 13,  45 => 6,  42 => 9,  39 => 9,  36 => 7,  33 => 4,  30 => 5,);
    }
}
