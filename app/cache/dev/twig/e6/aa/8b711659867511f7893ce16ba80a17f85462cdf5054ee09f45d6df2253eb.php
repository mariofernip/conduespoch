<?php

/* academicoBundle:reportes:actageneralcalificaciones.pdf.twig */
class __TwigTemplate_e6aa8b711659867511f7893ce16ba80a17f85462cdf5054ee09f45d6df2253eb extends Twig_Template
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
        echo "<pdf>
    
    <dynamic-page> 
          
       <placeholders>
               <header>
                    <div height=\"80px\" width=\"100%\">
                        <div style=\"text-align: center; vertical-align: middle; font-size: 15;\">ESCUELA DE FORMACIÓN Y CAPACITACIÓN DE CONDUCTORES PROFESIONALES ESPOCH CONDUESPOCH E.P.</div>
                        <div style=\"text-align: center; vertical-align: middle;  \"><p>Periodo: ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["periodo"]) ? $context["periodo"] : $this->getContext($context, "periodo")), "html", null, true);
        echo "</p></div>

                    </div>
                </header>
                <footer>
                    <div height=\"50px\" width=\"100%\">
                        Riobamba
                    </div>
                </footer>
            </placeholders>


<p style=\"text-align: center; vertical-align: middle;\"><b>Acta General de Calificaciones</b></p>
                        
<p><b>Curso: </b>";
        // line 23
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "curso"), "nombre")), "html", null, true);
        echo "  ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "paralelo"), "nombre")), "html", null, true);
        echo " ";
        echo "</p>

<div> <p><b>Docente: </b>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "nombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "apellido"), "html", null, true);
        echo "</p></div>
<div><p><b>Materia: </b>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "nombre"), "html", null, true);
        echo "</p></div>
<div>
    ";
        // line 28
        if (((isset($context["sd"]) ? $context["sd"] : $this->getContext($context, "sd")) == 1)) {
            // line 29
            echo "    <p style=\"text-align: right;\">Seccion: Diurna</p>
    <div style=\"text-align: center; vertical-align: middle;\">
        <table>            
                <tr >
                    <td>";
            // line 33
            echo "Nombre Completo";
            echo "</td>                    
                    <td>";
            // line 34
            echo "Prom. Tra. Gru";
            echo "</td>
                    <td>";
            // line 35
            echo "Prom. Est. Cas";
            echo "</td>
                    <td>";
            // line 36
            echo "Prom. Pra.";
            echo "</td>
                    <td>";
            // line 37
            echo "Prom. Teo.";
            echo "</td>
                    <td>";
            // line 38
            echo "Prom. Tot.";
            echo "</td>                    
                    <td>";
            // line 39
            echo "Sus.";
            echo "</td>                                       
                    <td>";
            // line 40
            echo "Equi.";
            echo "</td>
                   
                 </tr>
                            
        ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["estudiantes"]) ? $context["estudiantes"] : $this->getContext($context, "estudiantes")));
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 45
                echo "    <tr>            
        <td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "apellido"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "nombre"), "html", null, true);
                echo "</td>                
        <td>";
                // line 47
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 48
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 49
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 50
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 51
                echo twig_escape_filter($this->env, sprintf("%.0f", ((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4)), "html", null, true);
                echo "</td>
        <td>";
                // line 52
                echo "</td>
        <td>
        ";
                // line 54
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) < 14)) {
                    // line 55
                    echo "            <strong>Reprobado</strong>
        ";
                }
                // line 57
                echo "        ";
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) > 14)) {
                    // line 58
                    echo "            <strong>Aprobado</strong>
        ";
                }
                // line 59
                echo "</td>
        
    </tr>                  
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "     
                        
        </table>
    </div>
    ";
        }
        // line 68
        echo "    ";
        if (((isset($context["sv"]) ? $context["sv"] : $this->getContext($context, "sv")) == 1)) {
            // line 69
            echo "    <p style=\"text-align: right;\">Seccion: Vespertina</p>
    
    <div style=\"text-align: center; vertical-align: middle;\">
        <table>            
                <tr >
                    <td>";
            // line 74
            echo "Nombre Completo";
            echo "</td>                    
                    <td>";
            // line 75
            echo "Prom. Tra. Gru";
            echo "</td>
                    <td>";
            // line 76
            echo "Prom. Est. Cas";
            echo "</td>
                    <td>";
            // line 77
            echo "Prom. Pra.";
            echo "</td>
                    <td>";
            // line 78
            echo "Prom. Teo.";
            echo "</td>
                    <td>";
            // line 79
            echo "Prom. Tot.";
            echo "</td>                    
                    <td>";
            // line 80
            echo "Sus.";
            echo "</td>                                       
                    <td>";
            // line 81
            echo "Equi.";
            echo "</td>
                   
                 </tr>
                            
        ";
            // line 85
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["estudiantesv"]) ? $context["estudiantesv"] : $this->getContext($context, "estudiantesv")));
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 86
                echo "    <tr>            
        <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "apellido"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "nombre"), "html", null, true);
                echo "</td>                
        <td>";
                // line 88
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 89
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 90
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 91
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 92
                echo twig_escape_filter($this->env, sprintf("%.0f", ((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4)), "html", null, true);
                echo "</td>
        <td>";
                // line 93
                echo "</td>
        <td>
        ";
                // line 95
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) < 14)) {
                    // line 96
                    echo "            <strong>Reprobado</strong>
        ";
                }
                // line 98
                echo "        ";
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) > 14)) {
                    // line 99
                    echo "            <strong>Aprobado</strong>
        ";
                }
                // line 100
                echo "</td>
        
    </tr>                  
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "     
                        
        </table>
    </div>
    
    ";
        }
        // line 110
        echo "    ";
        if (((isset($context["sn"]) ? $context["sn"] : $this->getContext($context, "sn")) == 1)) {
            // line 111
            echo "    <p style=\"text-align: right;\">Seccion: Nocturna</p>
    
    <div style=\"text-align: center; vertical-align: middle;\">
        <table>            
                <tr >
                    <td>";
            // line 116
            echo "Nombre Completo";
            echo "</td>                    
                    <td>";
            // line 117
            echo "Prom. Tra. Gru";
            echo "</td>
                    <td>";
            // line 118
            echo "Prom. Est. Cas";
            echo "</td>
                    <td>";
            // line 119
            echo "Prom. Pra.";
            echo "</td>
                    <td>";
            // line 120
            echo "Prom. Teo.";
            echo "</td>
                    <td>";
            // line 121
            echo "Prom. Tot.";
            echo "</td>                    
                    <td>";
            // line 122
            echo "Sus.";
            echo "</td>                                       
                    <td>";
            // line 123
            echo "Equi.";
            echo "</td>
                   
                 </tr>
                            
        ";
            // line 127
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["estudiantesn"]) ? $context["estudiantesn"] : $this->getContext($context, "estudiantesn")));
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 128
                echo "    <tr>            
        <td>";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "apellido"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "nombre"), "html", null, true);
                echo "</td>                
        <td>";
                // line 130
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 131
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 132
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 133
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td>";
                // line 134
                echo twig_escape_filter($this->env, sprintf("%.0f", ((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4)), "html", null, true);
                echo "</td>
        <td>";
                // line 135
                echo "</td>
        <td>
        ";
                // line 137
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) < 14)) {
                    // line 138
                    echo "            <strong>Reprobado</strong>
        ";
                }
                // line 140
                echo "        ";
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) > 14)) {
                    // line 141
                    echo "            <strong>Aprobado</strong>
        ";
                }
                // line 142
                echo "</td>
        
    </tr>                  
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo "     
                        
        </table>
    </div>
    ";
        }
        // line 151
        echo "    
</div>


</dynamic-page>
</pdf>
     

    
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:reportes:actageneralcalificaciones.pdf.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  397 => 151,  390 => 146,  377 => 141,  370 => 138,  352 => 132,  348 => 131,  344 => 130,  335 => 128,  331 => 127,  316 => 121,  304 => 118,  289 => 111,  262 => 98,  244 => 91,  129 => 49,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 151,  696 => 150,  688 => 145,  685 => 144,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 124,  634 => 123,  626 => 122,  614 => 121,  608 => 120,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 112,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 79,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 67,  272 => 66,  251 => 63,  200 => 78,  207 => 72,  248 => 92,  233 => 82,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 74,  180 => 62,  23 => 3,  245 => 83,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 135,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 90,  265 => 99,  259 => 77,  239 => 114,  232 => 88,  228 => 87,  216 => 67,  192 => 76,  113 => 38,  137 => 51,  70 => 22,  185 => 50,  172 => 56,  190 => 63,  184 => 74,  181 => 77,  175 => 49,  165 => 54,  153 => 46,  150 => 47,  127 => 40,  124 => 39,  114 => 40,  76 => 27,  236 => 89,  226 => 87,  223 => 86,  205 => 72,  202 => 69,  191 => 50,  155 => 61,  84 => 25,  97 => 39,  81 => 35,  34 => 4,  213 => 71,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 63,  161 => 42,  146 => 54,  134 => 41,  104 => 30,  100 => 29,  65 => 28,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 66,  198 => 65,  194 => 64,  188 => 75,  160 => 62,  152 => 60,  148 => 45,  126 => 47,  118 => 45,  110 => 39,  90 => 32,  77 => 34,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 93,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 142,  379 => 119,  374 => 140,  368 => 137,  365 => 111,  362 => 110,  360 => 134,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 120,  309 => 110,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 69,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 91,  269 => 100,  254 => 92,  243 => 85,  240 => 90,  238 => 80,  235 => 74,  230 => 81,  227 => 76,  224 => 78,  221 => 80,  219 => 85,  217 => 79,  208 => 80,  204 => 79,  179 => 50,  159 => 47,  143 => 53,  135 => 50,  119 => 38,  102 => 28,  71 => 16,  67 => 29,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 37,  85 => 36,  75 => 23,  68 => 20,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 38,  88 => 26,  78 => 20,  46 => 23,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 77,  183 => 60,  171 => 59,  166 => 56,  163 => 43,  158 => 59,  156 => 51,  151 => 57,  142 => 44,  138 => 56,  136 => 38,  121 => 47,  117 => 36,  105 => 31,  91 => 31,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 21,  69 => 21,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 51,  145 => 54,  139 => 43,  131 => 41,  123 => 40,  120 => 43,  115 => 46,  111 => 33,  108 => 44,  101 => 40,  98 => 27,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 12,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 55,  164 => 54,  162 => 53,  154 => 58,  149 => 59,  147 => 55,  144 => 43,  141 => 52,  133 => 50,  130 => 40,  125 => 48,  122 => 45,  116 => 37,  112 => 45,  109 => 32,  106 => 29,  103 => 39,  99 => 25,  95 => 23,  92 => 27,  86 => 22,  82 => 21,  80 => 24,  73 => 33,  64 => 18,  60 => 26,  57 => 11,  54 => 25,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
