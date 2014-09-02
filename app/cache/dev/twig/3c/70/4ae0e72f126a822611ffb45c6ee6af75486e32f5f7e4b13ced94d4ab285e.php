<?php

/* administrativoBundle:Default:configuracion_general.html.twig */
class __TwigTemplate_3c704ae0e72f126a822611ffb45c6ee6af75486e32f5f7e4b13ced94d4ab285e extends Twig_Template
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " Perfil de Admin ";
    }

    // line 6
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_admin\">
    ";
        // line 10
        $this->env->loadTemplate("administrativoBundle:Default:menu_admin.html.twig")->display($context);
        // line 11
        echo "</section>

<p style=\"text-align: center ; color: #0035C7 \"><strong>INFORMACION GENERAL DEL SISTEMA</strong></p><br>


<strong>    
    <h2>Areas</h2>
    <br>
</strong>
<div id=\"areas\">
    <div id=\"areas_table\">
        <table class=\"display\" id=\"a_table\">
            <thead>
                <tr >
                    <th>";
        // line 25
        echo "Nombre";
        echo "</th>
                    <th>";
        // line 26
        echo "Descripcion";
        echo "</th>                   

                </tr>
            </thead>

            <tbody>";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listaareas"]) ? $context["listaareas"] : $this->getContext($context, "listaareas")));
        foreach ($context['_seq'] as $context["_key"] => $context["are"]) {
            // line 32
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["are"]) ? $context["are"] : $this->getContext($context, "are")), "nombre"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["are"]) ? $context["are"] : $this->getContext($context, "are")), "descripcion"), "html", null, true);
            echo "</td>                        
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['are'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "            </tbody>


        </table>
                <p  class=\"big\" align=\"right\"><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("area_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>
</div>

<hr>
<strong>    
    <h2>Materias</h2>
    <br>
</strong>
<div id=\"materias\">
    <div id=\"materias_table\">
        <table class=\"display\" id=\"m_table\">
            <thead>
                <tr>
                    <th>";
        // line 55
        echo "Nombre";
        echo "</th>
                    <th>";
        // line 56
        echo "Area";
        echo "</th>
                    <th>";
        // line 57
        echo "Numero Horas";
        echo "</th> 
                    <th>";
        // line 58
        echo "Descripcion";
        echo "</th> 
                    <th>";
        // line 59
        echo "Estado";
        echo "</th>                                         
                </tr>
            </thead>

            <tbody>";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 64
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nombre"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "area"), "html", null, true);
            echo "</td>                        
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "numerocreditos"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "descripcion"), "html", null, true);
            echo "</td>                        
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 69
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "estado") == 1)) {
                // line 70
                echo "                        <strong>Activo</strong>
        ";
            }
            // line 72
            echo "        ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "estado") == 0)) {
                // line 73
                echo "                        <strong>No activo</strong>
        ";
            }
            // line 74
            echo "</td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "            </tbody>    
        </table>
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 78
        echo $this->env->getExtension('routing')->getPath("materia_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>


</div>

<hr>    
<div align=\"center\" class=\"contenido\">
    <div class=\"columna-izquierda\">
        <strong>    
            <h2>Niveles</h2>
            <br>
        </strong>
        <table class=\"display\" id=\"c_table\">
            <thead>
                <tr >
                    <th>";
        // line 95
        echo "Nombre";
        echo "</th> 
                </tr>
            </thead>

            <tbody>";
        // line 99
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listacursos"]) ? $context["listacursos"] : $this->getContext($context, "listacursos")));
        foreach ($context['_seq'] as $context["_key"] => $context["cur"]) {
            // line 100
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cur"]) ? $context["cur"] : $this->getContext($context, "cur")), "nombre"), "html", null, true);
            echo "</td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "            </tbody>


        </table> 
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 107
        echo $this->env->getExtension('routing')->getPath("curso_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>

    <div class=\"columna-derecha\">
        <strong>    
            <h2> Paralelos</h2>
            <br>
        </strong>    
        <table class=\"display\" id=\"p_table\">
            <thead>
                <tr >
                    <th>";
        // line 119
        echo "Nombre";
        echo "</th> 
                </tr>
            </thead>

            <tbody>";
        // line 123
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listaparalelos"]) ? $context["listaparalelos"] : $this->getContext($context, "listaparalelos")));
        foreach ($context['_seq'] as $context["_key"] => $context["par"]) {
            // line 124
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 125
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["par"]) ? $context["par"] : $this->getContext($context, "par")), "nombre"), "html", null, true);
            echo "</td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['par'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo "            </tbody>
        </table> 
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>
";
        // line 133
        echo "
</div>

<hr>


<strong>    
    <h2>Cursos</h2>
    <br>
</strong>

<div id=\"niveles\">
    <div id=\"niveles_table\">
        <table class=\"display\" id=\"n_table\">
            <thead>
                <tr >
                    <th>";
        // line 149
        echo "Nivel";
        echo "</th> 
                    <th>";
        // line 150
        echo "Paralelo";
        echo "</th> 
                </tr>
            </thead>

            <tbody>";
        // line 154
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listaniveles"]) ? $context["listaniveles"] : $this->getContext($context, "listaniveles")));
        foreach ($context['_seq'] as $context["_key"] => $context["niv"]) {
            // line 155
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "curso"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "paralelo"), "html", null, true);
            echo "</td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['niv'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 159
        echo "            </tbody>
        </table> 
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>
</div>

<hr>
<strong>    
    <h2>Requisitos</h2>
    <br>
</strong>
<div id=\"requisitos\">
    <div id=\"requisitos_table\">
        <table class=\"display\" id=\"r_table\">
            <thead>
                <tr >
                    <th>";
        // line 176
        echo "Descripcion";
        echo "</th>                   
                    <th>";
        // line 177
        echo "Estado";
        echo "</th>

                </tr>
            </thead>

            <tbody>";
        // line 182
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listarequisitos"]) ? $context["listarequisitos"] : $this->getContext($context, "listarequisitos")));
        foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
            // line 183
            echo "                <tr>

                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 185
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "descripcion"), "html", null, true);
            echo "</td>   
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 186
            if (($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "estado") == 1)) {
                // line 187
                echo "                        <strong>Activo</strong>
        ";
            }
            // line 189
            echo "        ";
            if (($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "estado") == 0)) {
                // line 190
                echo "                        <strong>No activo</strong>
        ";
            }
            // line 191
            echo "</td>                      
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        echo "            </tbody>


        </table>
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>
</div>
<hr>



<div class=\"contenido\" id=\"dias\">
    <div class=\"columna-derecha\" id=\"dias_table\">
        <strong>    
            <h2>Dias</h2>
            <br>
        </strong>

        <table class=\"display\" id=\"dias_table\">
            <thead>
                <tr >
                    <th>";
        // line 215
        echo "Nombre";
        echo "</th>

                </tr>
            </thead>

            <tbody>";
        // line 220
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listadias"]) ? $context["listadias"] : $this->getContext($context, "listadias")));
        foreach ($context['_seq'] as $context["_key"] => $context["dia"]) {
            // line 221
            echo "                <tr>                   
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 222
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dia"]) ? $context["dia"] : $this->getContext($context, "dia")), "nombre"), "html", null, true);
            echo "</td>                                             
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 224
        echo "            </tbody>


        </table>
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>

    <div class=\"columna-derecha\" id=\"mes_table\">
        <strong>    
            <h2>Meses</h2>
            <br>
        </strong>

        <table class=\"display\" id=\"ms_table\">
            <thead>
                <tr >
                    <th>";
        // line 241
        echo "Nombre";
        echo "</th>
                    <th>";
        // line 242
        echo "Estado";
        echo "</th>
                </tr>
            </thead>

            <tbody>";
        // line 246
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listameses"]) ? $context["listameses"] : $this->getContext($context, "listameses")));
        foreach ($context['_seq'] as $context["_key"] => $context["mes"]) {
            // line 247
            echo "                <tr>                   
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 248
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "nombre"), "html", null, true);
            echo "</td>                                             
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                    ";
            // line 250
            if (($this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "estado") == 1)) {
                // line 251
                echo "                            <strong>Activo</strong>
                    ";
            }
            // line 253
            echo "                    ";
            if (($this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "estado") == 0)) {
                // line 254
                echo "                            <strong>No activo</strong>
                    ";
            }
            // line 255
            echo "</td>       
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 257
        echo "                </tbody>


            </table>
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
        </div>
    </div>

<hr>

    <strong>    
        <h2>Horas</h2>
        <br>
    </strong>
    <div id=\"horas\">
        <div id=\"horas_table\">
            <table class=\"display\" id=\"h_table\">
                <thead>
                    <tr>
                        <th>";
        // line 277
        echo "Hora inicio -- Hora fin";
        echo "</th>                                           
                        <th>";
        // line 278
        echo "Descripcion";
        echo "</th>                                       
                    </tr>
                </thead>

                <tbody>";
        // line 282
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listahoras"]) ? $context["listahoras"] : $this->getContext($context, "listahoras")));
        foreach ($context['_seq'] as $context["_key"] => $context["hor"]) {
            // line 283
            echo "                    <tr>
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 284
            echo twig_escape_filter($this->env, (isset($context["hor"]) ? $context["hor"] : $this->getContext($context, "hor")), "html", null, true);
            echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 285
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hor"]) ? $context["hor"] : $this->getContext($context, "hor")), "descripcion"), "html", null, true);
            echo "</td>                                             
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 287
        echo "                </tbody>    
            </table>
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 289
        echo $this->env->getExtension('routing')->getPath("hora_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        </div>


    </div>

    <hr>

    <strong>    
        <h2>Docente</h2>
        <br>
    </strong>
    <div id=\"docente\">
        <div id=\"docente_table\">
            <table class=\"display\" id=\"d_table\">
                <thead>
                    <tr>
                        <th>";
        // line 306
        echo "Cedula";
        echo "</th>
                        <th>";
        // line 307
        echo "Nombres/Apellidos";
        echo "</th>
                        <th>";
        // line 308
        echo "e-mail";
        echo "</th>                   
                        <th>";
        // line 309
        echo "Estado";
        echo "</th>                                       
                    </tr>
                </thead>

                <tbody>";
        // line 313
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listadocentes"]) ? $context["listadocentes"] : $this->getContext($context, "listadocentes")));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 314
            echo "                    <tr>
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 315
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "cedula"), "html", null, true);
            echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 316
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "apellido"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "nombre"), "html", null, true);
            echo "</td>   
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 317
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "email"), "html", null, true);
            echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 318
            if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 1)) {
                // line 319
                echo "                            <strong>Activo</strong>
        ";
            }
            // line 321
            echo "        ";
            if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 0)) {
                // line 322
                echo "                            <strong>No activo</strong>
        ";
            }
            // line 323
            echo "</td>
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 325
        echo "                </tbody>    
            </table>
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 327
        echo $this->env->getExtension('routing')->getPath("docente_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        </div>


    </div>
    <hr>

";
    }

    // line 335
    public function block_aside($context, array $blocks = array())
    {
        // line 336
        echo "
";
        // line 337
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    
<a href=\"";
        // line 339
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 343
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 344
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

";
        // line 346
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 347
        echo "    <style>
            .columna-izquierda{
                text-align:left;
                margin-right:5px;
                padding-left: 80px;
                float:left;
                width:245px;
            }
            .columna-derecha{
                float:right;
                width:245px;
                padding-right: 80px;
            }   
            .contenido{height:auto;overflow:auto}
            
            p.big {
            line-height: 200%;
            }
        </style>
   ";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:configuracion_general.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 122,  284 => 127,  277 => 118,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 119,  244 => 91,  129 => 56,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 119,  272 => 66,  251 => 63,  200 => 78,  207 => 72,  248 => 92,  233 => 82,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 74,  180 => 73,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 103,  232 => 88,  228 => 100,  216 => 67,  192 => 76,  113 => 55,  137 => 58,  70 => 22,  185 => 75,  172 => 56,  190 => 63,  184 => 74,  181 => 74,  175 => 49,  165 => 66,  153 => 46,  150 => 47,  127 => 43,  124 => 39,  114 => 38,  76 => 26,  236 => 89,  226 => 87,  223 => 86,  205 => 82,  202 => 69,  191 => 76,  155 => 65,  84 => 32,  97 => 39,  81 => 35,  34 => 4,  213 => 71,  206 => 52,  195 => 78,  186 => 58,  178 => 73,  170 => 55,  167 => 68,  161 => 65,  146 => 54,  134 => 45,  104 => 30,  100 => 29,  65 => 28,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 86,  198 => 80,  194 => 79,  188 => 75,  160 => 62,  152 => 64,  148 => 63,  126 => 47,  118 => 45,  110 => 37,  90 => 32,  77 => 34,  58 => 12,  53 => 8,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 149,  309 => 110,  305 => 95,  298 => 88,  294 => 133,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 72,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 124,  269 => 123,  254 => 111,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 85,  217 => 95,  208 => 80,  204 => 79,  179 => 50,  159 => 66,  143 => 53,  135 => 50,  119 => 38,  102 => 35,  71 => 16,  67 => 29,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 37,  85 => 36,  75 => 23,  68 => 25,  56 => 12,  87 => 33,  21 => 2,  26 => 6,  93 => 38,  88 => 49,  78 => 20,  46 => 23,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 77,  183 => 60,  171 => 69,  166 => 56,  163 => 67,  158 => 59,  156 => 51,  151 => 57,  142 => 44,  138 => 47,  136 => 38,  121 => 47,  117 => 36,  105 => 40,  91 => 34,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 26,  69 => 21,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 51,  145 => 54,  139 => 43,  131 => 41,  123 => 42,  120 => 41,  115 => 46,  111 => 33,  108 => 44,  101 => 52,  98 => 34,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 22,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 5,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 76,  182 => 49,  176 => 72,  173 => 70,  168 => 55,  164 => 54,  162 => 53,  154 => 58,  149 => 59,  147 => 55,  144 => 43,  141 => 59,  133 => 57,  130 => 40,  125 => 55,  122 => 58,  116 => 39,  112 => 45,  109 => 54,  106 => 36,  103 => 39,  99 => 36,  95 => 33,  92 => 27,  86 => 22,  82 => 21,  80 => 31,  73 => 33,  64 => 18,  60 => 26,  57 => 11,  54 => 25,  51 => 21,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 12,  33 => 3,  30 => 5,);
    }
}
