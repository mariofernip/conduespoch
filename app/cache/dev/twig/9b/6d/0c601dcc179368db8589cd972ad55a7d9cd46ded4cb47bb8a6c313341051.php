<?php

/* academicoBundle:Default:menu_amaterias.html.twig */
class __TwigTemplate_9b6d0c601dcc179368db8589cd972ad55a7d9cd46ded4cb47bb8a6c313341051 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<span class=\"preload1\"></span>
<span class=\"preload2\"></span>
";
        // line 3
        $context["rol"] = "amaterias";
        // line 4
        echo "<ul id=\"nave\">
    <li class=\"top\"><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("portada", array("role" => (isset($context["rol"]) ? $context["rol"] : $this->getContext($context, "rol")))), "html", null, true);
        echo "\" class=\"top_link\"><span>INICIO</span></a></li>
    <li class=\"top\"><a  id=\"products\" class=\"top_link\"><span class=\"down\">Asignar Materias</span></a>        
        <ul class=\"sub\">
            <li>
                <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("amaterias_dictadomateria");
        echo "\" class=\"fly\">Asignar</a>
            </li>                

            <li><a href=\"\" class=\"fly\">Ver</a>
                <ul>
                    <li><a href=\"#nogo4\">Nikon</a></li>
                    <li><a href=\"#nogo5\">Minolta</a></li>
                    <li><a href=\"#nogo6\">Pentax</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class=\"top\"><a  id=\"services\" class=\"top_link\"><span class=\"down\">Consultas</span></a>
        <ul class=\"sub\">
            <li><a href=\"\">Ver</a>
                <ul>
                    <li><a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("amaterias_lista_materias_asignadas");
        echo "\" >Todos</a></li>
                </ul>
            </li>
            
        </ul>
    </li>
    <li class=\"top\"><a  id=\"contacts\" class=\"top_link\"><span class=\"down\">Reportes</span></a>
        <ul class=\"sub\">
            <li><a href=\"#nogo28\">Reporte 1</a></li>
            <li><a href=\"#nogo29\" class=\"fly\">Lista Estudiantes</a>
                
            </li>            
        </ul>
    </li>


</ul>


<script type=\"text/javascript\">

    /* Credits: Stu Nicholls */
/* URL: http://www.stunicholls.com/menu/pro_drop_1/stuHover.js */

stuHover = function() {
        var cssRule;
        var newSelector;
        for (var i = 0; i < document.styleSheets.length; i++)
                for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
                        {
                        cssRule = document.styleSheets[i].rules[x];
                        if (cssRule.selectorText.indexOf(\"LI:hover\") >= 0)
                        {
                                 newSelector = cssRule.selectorText.replace(/LI:hover/gi, \"LI.iehover\");
                                document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);
                        }
                }
        var getElm = document.getElementById(\"nave\").getElementsByTagName(\"LI\");
        for (var i=0; i<getElm.length; i++) {
                getElm[i].onmouseover=function() {
                        this.className+=\" iehover\";
                }
                getElm[i].onmouseout=function() {
                        this.className=this.className.replace(new RegExp(\" iehover\\\\b\"), \"\");
                }
        }
}
if (window.attachEvent) window.attachEvent(\"onload\", stuHover);

    </script>





";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:menu_amaterias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 29,  137 => 34,  70 => 20,  185 => 50,  172 => 71,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 67,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 19,  236 => 113,  226 => 67,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 41,  84 => 21,  97 => 37,  81 => 22,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 65,  152 => 43,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 25,  77 => 21,  58 => 11,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 31,  107 => 39,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 42,  143 => 36,  135 => 53,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 22,  85 => 21,  75 => 22,  68 => 18,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 35,  88 => 34,  78 => 25,  46 => 8,  27 => 4,  44 => 6,  31 => 3,  28 => 5,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 53,  136 => 36,  121 => 46,  117 => 28,  105 => 25,  91 => 27,  62 => 16,  49 => 9,  24 => 1,  25 => 4,  19 => 1,  79 => 23,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 5,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 41,  111 => 36,  108 => 35,  101 => 38,  98 => 33,  96 => 26,  83 => 25,  74 => 24,  66 => 15,  55 => 12,  52 => 11,  50 => 8,  43 => 7,  41 => 8,  35 => 9,  32 => 2,  29 => 3,  209 => 82,  203 => 59,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 59,  147 => 39,  144 => 42,  141 => 48,  133 => 35,  130 => 41,  125 => 30,  122 => 31,  116 => 30,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 25,  92 => 36,  86 => 22,  82 => 29,  80 => 20,  73 => 20,  64 => 17,  60 => 14,  57 => 14,  54 => 25,  51 => 10,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
