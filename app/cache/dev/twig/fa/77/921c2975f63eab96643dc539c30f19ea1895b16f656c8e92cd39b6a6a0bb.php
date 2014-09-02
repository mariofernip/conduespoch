<?php

/* academicoBundle:Default:modificarestudiantematricula.html.twig */
class __TwigTemplate_fa77921c2975f63eab96643dc539c30f19ea1895b16f656c8e92cd39b6a6a0bb extends Twig_Template
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
            'stylesheets' => array($this, 'block_stylesheets'),
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

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "estudiante";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Modificar datos de matricula de estudiante";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_secre\">
    ";
        // line 10
        $this->env->loadTemplate("academicoBundle:Default:menu_secretaria.html.twig")->display($context);
        // line 11
        echo "</section>
<p style=\"color: #0035C7; text-align: center\"><strong>MODIFICAR MATRÍCULA DEL ESTUDIANTE</strong></p>
<table class=\"display\" id=\"itsthetable\" style=\"width: 330px\" align=\"left\">
    <thead>
        <th colspan=\"2\">DATOS DEL ESTUDIANTE</th>   
    </thead>
    <tbody>
        <tr>
          <td style=\"width: 250px\"><strong>Cédula:&nbsp;&nbsp;</strong>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "cedula"), "html", null, true);
        echo "</td>
          <td  ROWSPAN=3 ALIGN=\"CENTER\" style=\"vertical-align:middle; width: 80px; height: 80px\"><img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("uploads/documents/" . $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "path"))), "html", null, true);
        echo "\" width=\"80\" height=\"80\" border=\"0\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "nombre"), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "apellido"), "html", null, true);
        echo "\"></td>
        </tr>
        <tr>
            <td  class=\"odd\"><strong>Nombre:&nbsp;&nbsp;</strong>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "nombre"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
          <td ><strong>Apellido:&nbsp;&nbsp;</strong>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matricula"]) ? $context["matricula"] : $this->getContext($context, "matricula")), "estudiante"), "apellido"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>
<br><br><br><br><br><br><br><br>
";
        // line 31
        $context["eidm"] = (isset($context["mid"]) ? $context["mid"] : $this->getContext($context, "mid"));
        // line 32
        echo "<p style=\"color: #0035C7; text-align: left\"><strong>DATOS DE MATRÍCULA</strong></p>

<form action=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_matriculado_modificar", array("mid" => (isset($context["eidm"]) ? $context["eidm"] : $this->getContext($context, "eidm")))), "html", null, true);
        echo "\" method=\"post\" ";
        echo         // line 35
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'enctype');
        echo ">
        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'errors');
        echo "
          <fieldset>
                  ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "periodo"), 'row');
        echo "
                  ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nivel"), 'row');
        echo "
                  ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "seccion"), 'label', array("label" => "Seccion de estudio:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "seccion"), 'widget');
        echo "                                                        
                  ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "observaciones"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "
          
          </fieldset>   
         ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
</form>
<br><br>

";
    }

    // line 51
    public function block_aside($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    // line 55
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 56
        echo "      ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "                 
        ";
        // line 57
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:modificarestudiantematricula.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 39,  137 => 34,  70 => 18,  185 => 50,  172 => 71,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 67,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 19,  236 => 113,  226 => 67,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 56,  84 => 21,  97 => 34,  81 => 22,  34 => 4,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 53,  134 => 33,  104 => 36,  100 => 35,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 57,  152 => 55,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 23,  77 => 23,  58 => 11,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 44,  107 => 27,  61 => 16,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 50,  143 => 41,  135 => 53,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 25,  59 => 15,  38 => 4,  94 => 34,  89 => 22,  85 => 22,  75 => 29,  68 => 20,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 32,  88 => 34,  78 => 20,  46 => 8,  27 => 4,  44 => 15,  31 => 5,  28 => 1,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 51,  136 => 36,  121 => 30,  117 => 40,  105 => 25,  91 => 31,  62 => 16,  49 => 9,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 26,  69 => 18,  47 => 7,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 38,  98 => 30,  96 => 26,  83 => 26,  74 => 20,  66 => 17,  55 => 12,  52 => 10,  50 => 8,  43 => 9,  41 => 12,  35 => 9,  32 => 2,  29 => 1,  209 => 82,  203 => 59,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 72,  164 => 43,  162 => 51,  154 => 67,  149 => 59,  147 => 43,  144 => 42,  141 => 52,  133 => 35,  130 => 41,  125 => 31,  122 => 41,  116 => 30,  112 => 34,  109 => 38,  106 => 30,  103 => 26,  99 => 25,  95 => 24,  92 => 28,  86 => 22,  82 => 29,  80 => 21,  73 => 20,  64 => 19,  60 => 14,  57 => 14,  54 => 11,  51 => 11,  48 => 10,  45 => 9,  42 => 9,  39 => 7,  36 => 7,  33 => 5,  30 => 5,);
    }
}
