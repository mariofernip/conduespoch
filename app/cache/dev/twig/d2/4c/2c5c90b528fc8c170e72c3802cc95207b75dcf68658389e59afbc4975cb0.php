<?php

/* academicoBundle:Default:horarioclase.html.twig */
class __TwigTemplate_d24c2c5c90b528fc8c170e72c3802cc95207b75dcf68658389e59afbc4975cb0 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "requisito";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Horario de clases";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_secre\">
    ";
        // line 10
        $this->env->loadTemplate("academicoBundle:Default:menu_inspector.html.twig")->display($context);
        // line 11
        echo "</section>
<br><br>
<form action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inspector_horario_asignar", array("did" => (isset($context["did"]) ? $context["did"] : $this->getContext($context, "did")))), "html", null, true);
        echo "\" method=\"post\" ";
        echo         // line 14
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " >
        ";
        // line 15
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
            
        <div id=\"dt_example\">
                <table class=\"display\" id=\"example\">
                    <thead>
                        <tr>
                            <th colspan=\"3\">HORARIO DE CLASES</th>                     
                            
                        </tr>
                        <tr>
                            <th colspan=\"3\" align=\"left\"><span>CÉDULA: &nbsp;&nbsp;";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "cedula"), "html", null, true);
        echo "</span>&nbsp;&nbsp;&nbsp;<span>NOMBRE: &nbsp;&nbsp;";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente"))), "html", null, true);
        echo "</span></th>
                            
                        </tr>
                        
                        <tr>
                            <th>Materia</th>                     
                            <th>Dia</th>
                            <th>Hora</th>
                            
                        </tr>
                        </thead>        
                     <tbody>
                    ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dochoraclase"));
        foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
            // line 38
            echo "                    
                        <tr >
                            <td>";
            // line 40
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "dictadomateria"), 'widget', array("attr" => array("disabled" => true)));
            echo "</td>                                         
                            <td>";
            // line 41
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "dia"), 'widget');
            echo "</td> 
                            <td>";
            // line 42
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "hora"), 'widget');
            echo "</td> 
                        <tr>
                    <tbody>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                </table>
            </div> 
        <input type=\"submit\" value=\"guardar\" class=\"boton\" >
        ";
        // line 49
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    </form>


";
    }

    // line 55
    public function block_aside($context, array $blocks = array())
    {
        // line 56
        echo "
<div id=\"demo\">
<table class=\"display\" id=\"itsthetable\">
    <thead>
        <tr>
            <th>ASIGNAR HORARIOS</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["docentes"]) ? $context["docentes"] : $this->getContext($context, "docentes")));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 66
            echo "        <tr>
            <td> <a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inspector_horario_asignar", array("did" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "html", null, true);
            echo "</a></td>
        <tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "    </tbody>
</table>
    </div>

    ";
        // line 74
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
        <a href=\"";
        // line 75
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 77
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 78
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
        // line 79
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 80
        echo " ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:horarioclase.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 70,  153 => 61,  150 => 60,  127 => 46,  124 => 49,  114 => 34,  76 => 25,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 38,  81 => 30,  34 => 6,  213 => 62,  206 => 62,  195 => 68,  186 => 58,  178 => 52,  170 => 51,  167 => 50,  161 => 48,  146 => 41,  134 => 42,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 79,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 49,  107 => 36,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 58,  135 => 53,  119 => 46,  102 => 29,  71 => 17,  67 => 17,  63 => 15,  59 => 14,  38 => 6,  94 => 27,  89 => 24,  85 => 21,  75 => 18,  68 => 15,  56 => 13,  87 => 30,  21 => 2,  26 => 6,  93 => 37,  88 => 32,  78 => 22,  46 => 6,  27 => 4,  44 => 8,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 57,  171 => 74,  166 => 50,  163 => 45,  158 => 62,  156 => 45,  151 => 66,  142 => 59,  138 => 36,  136 => 56,  121 => 46,  117 => 44,  105 => 41,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 20,  72 => 24,  69 => 23,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 37,  120 => 43,  115 => 43,  111 => 33,  108 => 33,  101 => 40,  98 => 33,  96 => 24,  83 => 25,  74 => 21,  66 => 16,  55 => 12,  52 => 11,  50 => 10,  43 => 5,  41 => 8,  35 => 4,  32 => 4,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 66,  176 => 64,  173 => 52,  168 => 72,  164 => 59,  162 => 48,  154 => 67,  149 => 42,  147 => 65,  144 => 42,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 32,  116 => 35,  112 => 34,  109 => 42,  106 => 30,  103 => 32,  99 => 38,  95 => 37,  92 => 36,  86 => 31,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 10,  57 => 12,  54 => 10,  51 => 8,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
