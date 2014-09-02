<?php

/* academicoBundle:Default:modificarestudiante.html.twig */
class __TwigTemplate_d98c2a0588d073211e35f8b83acf2153172576d9a626c3ec318f2c22294775b3 extends Twig_Template
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
        // line 1
        $context["iactiva"] = (twig_date_format_filter($this->env, "now", "Ymd") <= twig_date_format_filter($this->env, $this->getAttribute((isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "ffininscripcion"), "Ymd"));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_id($context, array $blocks = array())
    {
        echo "estudiante";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Registro de un nuevo estudiante";
    }

    // line 9
    public function block_article($context, array $blocks = array())
    {
        // line 10
        echo "<section id=\"menu_secre\">
    ";
        // line 11
        $this->env->loadTemplate("academicoBundle:Default:menu_secretaria.html.twig")->display($context);
        // line 12
        echo "</section>
<p style=\"color: #0035C7; text-align: center\"><strong>MODIFICAR DATOS DEL ESTUDIANTE</strong></p>
";
        // line 14
        if ((isset($context["iactiva"]) ? $context["iactiva"] : $this->getContext($context, "iactiva"))) {
            // line 15
            $context["cedu"] = (isset($context["cedula"]) ? $context["cedula"] : $this->getContext($context, "cedula"));
            // line 16
            echo "<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_modificar_datos", array("cedula" => (isset($context["cedu"]) ? $context["cedu"] : $this->getContext($context, "cedu")))), "html", null, true);
            echo "\" method=\"post\" ";
            echo             // line 17
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'enctype');
            echo ">
        ";
            // line 18
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'errors');
            echo "
          <fieldset>
                  ";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'label', array("label" => "Número de cédula:"));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'errors');
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'widget', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre"), 'row', array("attr" => array("autocomplete" => "off")));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre"), 'errors');
            echo "
                  ";
            // line 22
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellido"), 'row', array("attr" => array("autocomplete" => "off")));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellido"), 'errors');
            echo "
                  ";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'label', array("label" => "Teléfono fijo"));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'widget', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "celular"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 25
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "calle"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 26
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "barrio"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "parroquia"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "ciudad"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'label', array("label" => "Correo"));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'errors');
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'widget', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "ocupacion"), 'row', array("attr" => array("autocomplete" => "off")));
            echo "
                  ";
            // line 31
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "lugarnacimiento"), 'label', array("label" => "Lugar de nacimiento"));
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "lugarnacimiento"), 'widget', array("attr" => array("autocomplete" => "off")));
            echo "

              
              </fieldset>   
         ";
            // line 35
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
            echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
          </form>

";
        }
        // line 40
        if ((!(isset($context["iactiva"]) ? $context["iactiva"] : $this->getContext($context, "iactiva")))) {
            // line 41
            echo "<h1>EL PERIODO DE INSCRIPCIONES HA VENCIDO</h1>
<h1>Para mayor información comuicarse con el administrador del sistema</h1>
<a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("_portada");
            echo "\">regresar</a>
";
        }
        // line 45
        echo "


";
    }

    // line 50
    public function block_aside($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:modificarestudiante.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 29,  137 => 34,  70 => 18,  185 => 50,  172 => 71,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 67,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 19,  236 => 113,  226 => 67,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 41,  84 => 21,  97 => 37,  81 => 22,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 65,  152 => 45,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 23,  77 => 21,  58 => 11,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 31,  107 => 27,  61 => 16,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 50,  143 => 41,  135 => 53,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 25,  59 => 15,  38 => 4,  94 => 34,  89 => 22,  85 => 22,  75 => 29,  68 => 25,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 35,  88 => 34,  78 => 20,  46 => 10,  27 => 4,  44 => 15,  31 => 5,  28 => 1,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 53,  136 => 36,  121 => 30,  117 => 28,  105 => 25,  91 => 27,  62 => 16,  49 => 11,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 26,  69 => 18,  47 => 7,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 38,  98 => 30,  96 => 26,  83 => 22,  74 => 20,  66 => 17,  55 => 12,  52 => 14,  50 => 8,  43 => 9,  41 => 12,  35 => 9,  32 => 2,  29 => 3,  209 => 82,  203 => 59,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 72,  164 => 43,  162 => 51,  154 => 67,  149 => 59,  147 => 43,  144 => 42,  141 => 40,  133 => 35,  130 => 41,  125 => 31,  122 => 31,  116 => 30,  112 => 34,  109 => 26,  106 => 30,  103 => 26,  99 => 25,  95 => 24,  92 => 28,  86 => 22,  82 => 29,  80 => 21,  73 => 20,  64 => 17,  60 => 14,  57 => 14,  54 => 13,  51 => 11,  48 => 10,  45 => 9,  42 => 9,  39 => 7,  36 => 7,  33 => 5,  30 => 5,);
    }
}
