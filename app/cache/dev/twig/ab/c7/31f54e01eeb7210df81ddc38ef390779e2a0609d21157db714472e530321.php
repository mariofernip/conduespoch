<?php

/* academicoBundle:reportes:docente_notassuspenso.pdf.twig */
class __TwigTemplate_abc731f54e01eeb7210df81ddc38ef390779e2a0609d21157db714472e530321 extends Twig_Template
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
        echo "<pdf Title=\"Notas de supletorios: ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, (isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel"))), "html", null, true);
        echo "\" Author=\"";
        echo twig_escape_filter($this->env, (isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "html", null, true);
        echo "\">
    <dynamic-page>
        <placeholders>
            <header>
                <div height=\"170px\" width=\"100%\">
                    <div font-style=\"bold\" margin=\" 60px 150px 60px 10px\" color=\"black\"  font-size=\"18px\" height=\"30px\" text-align=\"center\">
                        <table>
                            <tr>
                                <td><br/><br/>ESCUELA DE CONDUCCIÓN PROFESIONAL CONDUESPOCH E.P</td><td width=\"55\" height=\"45\" ><img src=\"uploads/iconos/logo.jpg\"  width=\"55\" height=\"45\" /></td>
                            </tr>
                            <tr>
                                <td font-size=\"10\" colspan=\"2\">PERIODO ACADÉMICO: ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "html", null, true);
        echo "</td>
                            </tr>
                        </table>
                        <br/>
                        <div font-style=\"bold\" margin=\" 10px 10px 10px 10px\" color=\"black\"  font-size=\"14px\"  text-align=\"center\">
                                
                        </div>
                        <div  font-style=\"bold\"  color=\"black\"   font-size=\"14px\" height=\"10px\" text-align=\"left\">
                            CURSO:";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "html", null, true);
        echo " <br/>
                            MATERIA: ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "nombre"), "html", null, true);
        echo "<br/>
                            DOCENTE: ";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "html", null, true);
        echo "<br/>
                            <p text-align=\"center\" font-style=\"bold\">NOTAS DE SUPLETORIOS</p><br/>
                        </div>
                    </div>                    
                </div>
            </header>
            <footer>
                <div height=\"20px\" width=\"80%\"  text-align=\"center\" font-size=\"10px\" font-style=\"italic\">
                    Dirección: Panamericana Sur km 1 1/2, Riobamba - Ecuador <br/>
                    (c)Sistema conduespoch
                    <div margin=\"6px 10px\"  text-align=\"right\" font-size=\"10px\" font-style=\"bold\">
                        <page-info format=\"%s / %s\" />
                    </div>    
                </div>
            </footer>
        </placeholders>
        <br/><br/>
        <table margin=\" 60px 10px 60px 10px\"  >
            <tr text-align=\"center\" font-style=\"bold\">
                <td height=\"13\">CÉDULA</td>
                <td>ESTUDIANTE</td>
                <td>SECCIÓN</td>
                <td>NOTA SUSP.</td>                
                <td>PROM. FINAL</td>                
                <td>EQUIVALENCIA</td> 
            </tr>
            ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lista"]) ? $context["lista"] : $this->getContext($context, "lista")));
        foreach ($context['_seq'] as $context["_key"] => $context["ma"]) {
            // line 49
            echo "            <tr >
                <td width=\"70\" height=\"13\" text-align=\"left\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "matricula"), "estudiante"), "cedula"), "html", null, true);
            echo "</td>
                <td>";
            // line 51
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "matricula"), "estudiante"), "apellido")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "matricula"), "estudiante"), "nombre")), "html", null, true);
            echo "</td>
                <td width=\"60\" text-align=\"center\"  >";
            // line 52
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "matricula"), "seccion")), "html", null, true);
            echo "</td>
                <td width=\"40\" text-align=\"center\">";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "notasuspenso"), "html", null, true);
            echo "</td>
                <td width=\"40\" text-align=\"center\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "promediofinal"), "html", null, true);
            echo "</td>
                <td width=\"80\" text-align=\"center\">";
            // line 55
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "equivalencia")), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ma'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "        </table>
    </dynamic-page>
</pdf>
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:reportes:docente_notassuspenso.pdf.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  397 => 151,  390 => 146,  377 => 141,  370 => 138,  352 => 132,  348 => 131,  344 => 130,  335 => 128,  331 => 127,  316 => 121,  304 => 118,  289 => 111,  262 => 98,  244 => 91,  129 => 49,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 151,  696 => 150,  688 => 145,  685 => 144,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 124,  634 => 123,  626 => 122,  614 => 121,  608 => 120,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 112,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 79,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 67,  272 => 66,  251 => 63,  200 => 78,  207 => 72,  248 => 92,  233 => 82,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 74,  180 => 62,  23 => 3,  245 => 83,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 135,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 90,  265 => 99,  259 => 77,  239 => 114,  232 => 88,  228 => 87,  216 => 67,  192 => 76,  113 => 55,  137 => 51,  70 => 22,  185 => 50,  172 => 56,  190 => 63,  184 => 74,  181 => 77,  175 => 49,  165 => 54,  153 => 46,  150 => 47,  127 => 40,  124 => 39,  114 => 40,  76 => 27,  236 => 89,  226 => 87,  223 => 86,  205 => 72,  202 => 69,  191 => 50,  155 => 61,  84 => 48,  97 => 39,  81 => 35,  34 => 4,  213 => 71,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 63,  161 => 42,  146 => 54,  134 => 41,  104 => 30,  100 => 29,  65 => 28,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 66,  198 => 65,  194 => 64,  188 => 75,  160 => 62,  152 => 60,  148 => 45,  126 => 47,  118 => 45,  110 => 39,  90 => 32,  77 => 34,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 93,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 142,  379 => 119,  374 => 140,  368 => 137,  365 => 111,  362 => 110,  360 => 134,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 120,  309 => 110,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 69,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 91,  269 => 100,  254 => 92,  243 => 85,  240 => 90,  238 => 80,  235 => 74,  230 => 81,  227 => 76,  224 => 78,  221 => 80,  219 => 85,  217 => 79,  208 => 80,  204 => 79,  179 => 50,  159 => 47,  143 => 53,  135 => 50,  119 => 38,  102 => 28,  71 => 16,  67 => 29,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 37,  85 => 36,  75 => 23,  68 => 20,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 38,  88 => 49,  78 => 20,  46 => 23,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 77,  183 => 60,  171 => 59,  166 => 56,  163 => 43,  158 => 59,  156 => 51,  151 => 57,  142 => 44,  138 => 56,  136 => 38,  121 => 47,  117 => 36,  105 => 53,  91 => 50,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 21,  69 => 21,  47 => 20,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 51,  145 => 54,  139 => 43,  131 => 41,  123 => 40,  120 => 43,  115 => 46,  111 => 33,  108 => 44,  101 => 52,  98 => 27,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 22,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 55,  164 => 54,  162 => 53,  154 => 58,  149 => 59,  147 => 55,  144 => 43,  141 => 52,  133 => 50,  130 => 40,  125 => 48,  122 => 58,  116 => 37,  112 => 45,  109 => 54,  106 => 29,  103 => 39,  99 => 25,  95 => 51,  92 => 27,  86 => 22,  82 => 21,  80 => 24,  73 => 33,  64 => 18,  60 => 26,  57 => 11,  54 => 25,  51 => 21,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 12,  33 => 3,  30 => 5,);
    }
}
