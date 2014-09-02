<?php

/* academicoBundle:Default:verdocentehorario.html.twig */
class __TwigTemplate_49591a3332fd64e6f4686c5a28001c2a2b716e1564e8bb598a2863989f3bbb5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "<section id=\"menu_docente\">
        ";
        // line 7
        $this->env->loadTemplate("academicoBundle:Default:menu_docente.html.twig")->display(array_merge($context, array("mesevac" => (isset($context["mesevac"]) ? $context["mesevac"] : $this->getContext($context, "mesevac")), "listamaterias" => (isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")))));
        // line 8
        echo "</section>
        
";
        // line 11
        echo "
<strong><p>Mi Horario</p></strong>
<div id=\"dt_example\">
    <div id=\"demo\">
        
        <table class=\"display\" id=\"example\">
            <thead>   
                <tr>
                    <th colspan=\"6\" ALIGN=\"CENTER\">HORARIO DE CLASES</th>
                </tr>
                <tr>
                    <th colspan=\"6\" ALIGN=\"LEFT\">CÉDULA: ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "cedula"), "html", null, true);
        echo "    ";
        echo " NOMBRE: ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "nombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "apellido"), "html", null, true);
        echo "</th>
                </tr>
                 <tr >
                    <th>";
        // line 25
        echo "Hora";
        echo "</th>                     
                    <th>";
        // line 26
        echo "Lunes";
        echo "</th> 
                    <th>";
        // line 27
        echo "Martes";
        echo "</th>
                    <th>";
        // line 28
        echo "Miercoles";
        echo "</th>
                    <th>";
        // line 29
        echo "Jueves";
        echo "</th>
                    <th>";
        // line 30
        echo "Viernes";
        echo "</th>
                 
                 </tr>
                </thead>                                
        
<tbody>
    <tr>                            
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">8:00 10:00</td>
        
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                       ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            echo "  ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "LUNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "08:00 -- 10:00")) {
                    echo " <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 42
                echo "           
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "</td> 
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MARTES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "08:00 -- 10:00")) {
                    // line 45
                    echo "                        <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 47
                echo "        ";
            }
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MIERCOLES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "08:00 -- 10:00")) {
                    // line 49
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo " </td>      
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "JUEVES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "08:00 -- 10:00")) {
                    // line 52
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
            // line 53
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  </td>    
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "VIERNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "08:00 -- 10:00")) {
                    // line 55
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "  </td>     
        
    </tr>
    <tr>                            
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">12:00 14:00</td>
        
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                       ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            echo "  ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "LUNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "12:00 -- 14:00")) {
                    echo " <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 65
                echo "           
        ";
            }
            // line 66
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td> 
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MARTES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "12:00 -- 14:00")) {
                    // line 68
                    echo "                        <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 70
                echo "        ";
            }
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MIERCOLES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "12:00 -- 14:00")) {
                    // line 72
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo " </td>      
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 74
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "JUEVES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "12:00 -- 14:00")) {
                    // line 75
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
            // line 76
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  </td>    
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "VIERNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "12:00 -- 14:00")) {
                    // line 78
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "  </td>     
        
    </tr>
    <tr>                            
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">14:00 16:00</td>
        
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                       ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            echo "  ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "LUNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "14:00 -- 16:00")) {
                    echo " <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 88
                echo "           
        ";
            }
            // line 89
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td> 
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MARTES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "14:00 -- 16:00")) {
                    // line 91
                    echo "                        <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 93
                echo "        ";
            }
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 94
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MIERCOLES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "14:00 -- 16:00")) {
                    // line 95
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo " </td>      
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "JUEVES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "14:00 -- 16:00")) {
                    // line 98
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
            // line 99
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  </td>    
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "VIERNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "14:00 -- 16:00")) {
                    // line 101
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "  </td>     
        
    </tr>
    <tr>                            
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">16:00 18:00</td>
        
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                       ";
        // line 109
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            echo "  ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "LUNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "16:00 -- 18:00")) {
                    echo " <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 111
                echo "           
        ";
            }
            // line 112
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td> 
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 113
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MARTES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "16:00 -- 18:00")) {
                    // line 114
                    echo "                        <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
                // line 116
                echo "        ";
            }
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "MIERCOLES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "16:00 -- 18:00")) {
                    // line 118
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo " </td>      
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 120
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "JUEVES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "16:00 -- 18:00")) {
                    // line 121
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
            // line 122
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "  </td>    
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
        // line 123
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia") == "VIERNES")) {
                if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora") == "16:00 -- 18:00")) {
                    // line 124
                    echo "            <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                    echo "</strong>";
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                    echo "
        ";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "  </td>     
        
    </tr>
</tbody>                       
        
                        
        </table>
    
    </div>
</div>
<br>

";
    }

    // line 138
    public function block_aside($context, array $blocks = array())
    {
        // line 139
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <a href=\"";
        // line 140
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 144
    public function block_javascripts($context, array $blocks = array())
    {
        // line 145
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

";
    }

    // line 150
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 151
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
         ";
        // line 152
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 153
        echo "
<style>
   
  input[type=\"number\"] {
   width:50px;
}
</style>



   ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:verdocentehorario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  705 => 153,  703 => 152,  699 => 151,  696 => 150,  688 => 145,  685 => 144,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 124,  634 => 123,  626 => 122,  614 => 121,  608 => 120,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 112,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 79,  358 => 77,  350 => 76,  338 => 75,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 68,  280 => 67,  272 => 66,  251 => 63,  200 => 52,  207 => 72,  248 => 86,  233 => 82,  218 => 74,  174 => 60,  222 => 85,  212 => 53,  197 => 74,  180 => 62,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 78,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 70,  228 => 87,  216 => 67,  192 => 57,  113 => 38,  137 => 34,  70 => 22,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 49,  165 => 54,  153 => 46,  150 => 46,  127 => 41,  124 => 33,  114 => 40,  76 => 27,  236 => 113,  226 => 55,  223 => 81,  205 => 72,  202 => 69,  191 => 50,  155 => 61,  84 => 21,  97 => 29,  81 => 25,  34 => 4,  213 => 64,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 54,  134 => 41,  104 => 30,  100 => 26,  65 => 19,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 56,  225 => 78,  215 => 73,  211 => 66,  198 => 59,  194 => 51,  188 => 49,  160 => 62,  152 => 60,  148 => 45,  126 => 47,  118 => 45,  110 => 39,  90 => 32,  77 => 23,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 93,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 65,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 65,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 85,  235 => 74,  230 => 81,  227 => 81,  224 => 78,  221 => 80,  219 => 84,  217 => 79,  208 => 61,  204 => 72,  179 => 50,  159 => 47,  143 => 53,  135 => 50,  119 => 44,  102 => 28,  71 => 16,  67 => 16,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 27,  85 => 26,  75 => 23,  68 => 20,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 28,  88 => 31,  78 => 20,  46 => 7,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 62,  171 => 59,  166 => 56,  163 => 43,  158 => 62,  156 => 51,  151 => 55,  142 => 44,  138 => 56,  136 => 38,  121 => 46,  117 => 36,  105 => 31,  91 => 31,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 21,  69 => 25,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 48,  145 => 57,  139 => 43,  131 => 42,  123 => 40,  120 => 43,  115 => 29,  111 => 33,  108 => 35,  101 => 30,  98 => 27,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 12,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 1,  209 => 63,  203 => 78,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 52,  162 => 53,  154 => 60,  149 => 59,  147 => 43,  144 => 43,  141 => 57,  133 => 35,  130 => 40,  125 => 31,  122 => 45,  116 => 37,  112 => 43,  109 => 32,  106 => 29,  103 => 39,  99 => 25,  95 => 23,  92 => 27,  86 => 22,  82 => 21,  80 => 20,  73 => 26,  64 => 18,  60 => 17,  57 => 11,  54 => 11,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
