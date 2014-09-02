<?php

/* academicoBundle:Default:actageneralcalificaciones.html.twig */
class __TwigTemplate_98f27590f38db04e8101277b6e61d71702073d54ca2f35b39e9751d752a98985 extends Twig_Template
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
<h3><p align=\"center\"></p></h3>
        
";
        // line 12
        echo "
<strong><p>Acta General de Calificaciones</p></strong>

<div>";
        // line 15
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "curso"), "nombre")), "html", null, true);
        echo "&nbsp;&nbsp;";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "paralelo"), "nombre")), "html", null, true);
        echo "&nbsp;&nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "nombre"), "html", null, true);
        echo "</div>

<div id=\"dt_example\">
    
    <div id=\"demo\">
         ";
        // line 20
        if (((isset($context["sd"]) ? $context["sd"] : $this->getContext($context, "sd")) == 1)) {
            // line 21
            echo "        <table class=\"display\" id=\"itsthetable\">
            <thead>
                <tr >
                    <th>";
            // line 24
            echo "Seccion- Cedula- Nombre Completo";
            echo "</th>
                    <th>";
            // line 25
            echo "Prom. Tra. Gru";
            echo "</th>
                    <th>";
            // line 26
            echo "Prom. Est. Cas";
            echo "</th>
                    <th>";
            // line 27
            echo "Prom. Pra.";
            echo "</th>
                    <th>";
            // line 28
            echo "Prom. Teo.";
            echo "</th>
                    <th>";
            // line 29
            echo "Prom. Tot.";
            echo "</th>                    
                    <th>";
            // line 30
            echo "Sus.";
            echo "</th>                                       
                    <th>";
            // line 31
            echo "Equi.";
            echo "</th>
                   
                 </tr>
                </thead>
                            
        ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["estudiantes"]) ? $context["estudiantes"] : $this->getContext($context, "estudiantes")));
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 37
                echo "<tbody>
    <tr>            
        <td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "seccion"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "cedula"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "apellido"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "nombre"), "html", null, true);
                echo "</td>                
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 40
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 41
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 42
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 43
                echo twig_escape_filter($this->env, sprintf("%.2f", ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))), "html", null, true);
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 44
                echo twig_escape_filter($this->env, sprintf("%.0f", ((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4)), "html", null, true);
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 45
                echo "</td>
        <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
        ";
                // line 47
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) < 14)) {
                    // line 48
                    echo "            <strong>Reprobado</strong>
        ";
                }
                // line 50
                echo "        ";
                if ((((((($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notatb") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo"))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notaec") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapp") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) + ($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "notapt") / (isset($context["mesconteo"]) ? $context["mesconteo"] : $this->getContext($context, "mesconteo")))) / 4) > 14)) {
                    // line 51
                    echo "            <strong>Aprobado</strong>
        ";
                }
                // line 52
                echo "</td>
        
    </tr>
</tbody>                       
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "     
                        
        </table>
<a class=\"boton\" href=\"";
            // line 60
            echo $this->env->getExtension('routing')->getPath("acta_general_calificaciones_reporte");
            echo "\">REPORTE</a>
            
    ";
        } else {
            // line 63
            echo "        <h1>No hay estudiantes</h1>
    ";
        }
        // line 65
        echo "    </div>
</div>
<br>
";
        // line 69
        echo "
";
    }

    // line 71
    public function block_aside($context, array $blocks = array())
    {
        // line 72
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    ";
        // line 73
        $context["docente"] = "docente";
        // line 74
        echo "        <p align=\"center\"><a class=\"boton\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("portada", array("role" => (isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")))), "html", null, true);
        echo "\">PORTADA</a></p>
          <strong><p align=\"left\">Materias</p></strong>
    <div id=\"relacionadas\">
        <ul>
       ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 79
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_variable_sesion", array("niv" => $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nivel"), "id"), "mat" => $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "materia"), "id"))), "html", null, true);
            echo "\" class=\"boton\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nivel")), "html", null, true);
            echo "&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "materia"), "nombre")), "html", null, true);
            echo "</a></li>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "            </ul>
        </div>
          
    <a href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 88
    public function block_javascripts($context, array $blocks = array())
    {
        // line 89
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></script>
    <script type=\"text/javascript\">
    (function(\$){var ie6=\$.browser.msie&&parseInt(\$.browser.version)==6&&!window['XMLHttpRequest'],ieQuirks=\$.browser.msie&&!\$.boxModel,w=[];\$.modal=function(data,options){return \$.modal.impl.init(data,options);};\$.modal.close=function(){\$.modal.impl.close();};\$.fn.modal=function(options){return \$.modal.impl.init(this,options);};\$.modal.defaults={opacity:50,overlayId:'simplemodal-overlay',overlayCss:{},containerId:'simplemodal-container',containerCss:{},dataCss:{},zIndex:1000,close:true,closeHTML:'<a class=\"modalCloseImg\" title=\"Close\"></a>',closeClass:'simplemodal-close',position:null,persist:false,onOpen:null,onShow:null,onClose:null};\$.modal.impl={opts:null,dialog:{},init:function(data,options){if(this.dialog.data){return false;}this.opts=\$.extend({},\$.modal.defaults,options);this.zIndex=this.opts.zIndex;this.occb=false;if(typeof data=='object'){data=data instanceof jQuery?data:\$(data);if(data.parent().parent().size()>0){this.dialog.parentNode=data.parent();if(!this.opts.persist){this.dialog.orig=data.clone(true);}}}else if(typeof data=='string'||typeof data=='number'){data=\$('<div/>').html(data);}else{alert('SimpleModal Error: Unsupported data type: '+typeof data);return false;}this.dialog.data=data.addClass('simplemodal-data').css(this.opts.dataCss);data=null;this.create();this.open();if(\$.isFunction(this.opts.onShow)){this.opts.onShow.apply(this,[this.dialog]);}return this;},create:function(){w=this.getDimensions();if(ie6){this.dialog.iframe=\$('<iframe src=\"javascript:false;\"/>').css(\$.extend(this.opts.iframeCss,{display:'none',opacity:0,position:'fixed',height:w[0],width:w[1],zIndex:this.opts.zIndex,top:0,left:0})).appendTo('body');}this.dialog.overlay=\$('<div/>').attr('id',this.opts.overlayId).addClass('simplemodal-overlay').css(\$.extend(this.opts.overlayCss,{display:'none',opacity:this.opts.opacity/100,height:w[0],width:w[1],position:'fixed',left:0,top:0,zIndex:this.opts.zIndex+1})).appendTo('body');this.dialog.container=\$('<div/>').attr('id',this.opts.containerId).addClass('simplemodal-container').css(\$.extend(this.opts.containerCss,{display:'none',position:'fixed',zIndex:this.opts.zIndex+2})).append(this.opts.close?\$(this.opts.closeHTML).addClass(this.opts.closeClass):'').appendTo('body');this.setPosition();if(ie6||ieQuirks){this.fixIE();}this.dialog.container.append(this.dialog.data.hide());},bindEvents:function(){var self=this;\$('.'+this.opts.closeClass).bind('click.simplemodal',function(e){e.preventDefault();self.close();});\$(window).bind('resize.simplemodal',function(){w=self.getDimensions();self.setPosition();if(ie6||ieQuirks){self.fixIE();}else{self.dialog.iframe&&self.dialog.iframe.css({height:w[0],width:w[1]});self.dialog.overlay.css({height:w[0],width:w[1]});}});},unbindEvents:function(){\$('.'+this.opts.closeClass).unbind('click.simplemodal');\$(window).unbind('resize.simplemodal');},fixIE:function(){var p=this.opts.position;\$.each([this.dialog.iframe||null,this.dialog.overlay,this.dialog.container],function(i,el){if(el){var bch='document.body.clientHeight',bcw='document.body.clientWidth',bsh='document.body.scrollHeight',bsl='document.body.scrollLeft',bst='document.body.scrollTop',bsw='document.body.scrollWidth',ch='document.documentElement.clientHeight',cw='document.documentElement.clientWidth',sl='document.documentElement.scrollLeft',st='document.documentElement.scrollTop',s=el[0].style;s.position='absolute';if(i<2){s.removeExpression('height');s.removeExpression('width');s.setExpression('height',''+bsh+' > '+bch+' ? '+bsh+' : '+bch+' + \"px\"');s.setExpression('width',''+bsw+' > '+bcw+' ? '+bsw+' : '+bcw+' + \"px\"');}else{var te,le;if(p&&p.constructor==Array){if(p[0]){var top=typeof p[0]=='number'?p[0].toString():p[0].replace(/px/,'');te=top.indexOf('%')==-1?top+' + (t = '+st+' ? '+st+' : '+bst+') + \"px\"':parseInt(top.replace(/%/,''))+' * (('+ch+' || '+bch+') / 100) + (t = '+st+' ? '+st+' : '+bst+') + \"px\"';}if(p[1]){var left=typeof p[1]=='number'?p[1].toString():p[1].replace(/px/,'');le=left.indexOf('%')==-1?left+' + (t = '+sl+' ? '+sl+' : '+bsl+') + \"px\"':parseInt(left.replace(/%/,''))+' * (('+cw+' || '+bcw+') / 100) + (t = '+sl+' ? '+sl+' : '+bsl+') + \"px\"';}}else{te='('+ch+' || '+bch+') / 2 - (this.offsetHeight / 2) + (t = '+st+' ? '+st+' : '+bst+') + \"px\"';le='('+cw+' || '+bcw+') / 2 - (this.offsetWidth / 2) + (t = '+sl+' ? '+sl+' : '+bsl+') + \"px\"';}s.removeExpression('top');s.removeExpression('left');s.setExpression('top',te);s.setExpression('left',le);}}});},getDimensions:function(){var el=\$(window);var h=\$.browser.opera&&\$.browser.version>'9.5'&&\$.fn.jquery<='1.2.6'?document.documentElement['clientHeight']:el.height();return[h,el.width()];},setPosition:function(){var top,left,hCenter=(w[0]/2)-((this.dialog.container.height()||this.dialog.data.height())/2),vCenter=(w[1]/2)-((this.dialog.container.width()||this.dialog.data.width())/2);if(this.opts.position&&this.opts.position.constructor==Array){top=this.opts.position[0]||hCenter;left=this.opts.position[1]||vCenter;}else{top=hCenter;left=vCenter;}this.dialog.container.css({left:left,top:top});},open:function(){this.dialog.iframe&&this.dialog.iframe.show();if(\$.isFunction(this.opts.onOpen)){this.opts.onOpen.apply(this,[this.dialog]);}else{this.dialog.overlay.show();this.dialog.container.show();this.dialog.data.show();}this.bindEvents();},close:function(){if(!this.dialog.data){return false;}if(\$.isFunction(this.opts.onClose)&&!this.occb){this.occb=true;this.opts.onClose.apply(this,[this.dialog]);}else{if(this.dialog.parentNode){if(this.opts.persist){this.dialog.data.hide().appendTo(this.dialog.parentNode);}else{this.dialog.data.remove();this.dialog.orig.appendTo(this.dialog.parentNode);}}else{this.dialog.data.remove();}this.dialog.container.remove();this.dialog.overlay.remove();this.dialog.iframe&&this.dialog.iframe.remove();this.dialog={};}this.unbindEvents();}};})(jQuery);
    </script>


<script type='text/javascript'>

    \$(document).ready(function(){
    
    //get the height and width of the page
    var window_width = \$(window).width();
    var window_height = \$(window).height();
    
    //vertical and horizontal centering of modal window(s)
    /*we will use each function so if we have more then 1 
    modal window we center them all*/
        
    });
    
    //THE FUNCTIONS
    
    
    
</script>


";
    }

    // line 120
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 121
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

";
        // line 123
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 124
        echo "
   ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:actageneralcalificaciones.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 60,  160 => 47,  152 => 44,  148 => 43,  126 => 39,  118 => 36,  110 => 31,  90 => 26,  77 => 21,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 41,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 74,  208 => 71,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 29,  71 => 19,  67 => 15,  63 => 15,  59 => 14,  38 => 6,  94 => 27,  89 => 20,  85 => 25,  75 => 20,  68 => 14,  56 => 9,  87 => 25,  21 => 2,  26 => 6,  93 => 28,  88 => 6,  78 => 21,  46 => 7,  27 => 4,  44 => 12,  31 => 5,  28 => 3,  201 => 92,  196 => 90,  183 => 57,  171 => 61,  166 => 50,  163 => 62,  158 => 67,  156 => 45,  151 => 63,  142 => 59,  138 => 54,  136 => 40,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  24 => 4,  25 => 3,  19 => 1,  79 => 18,  72 => 16,  69 => 25,  47 => 9,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 28,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 15,  52 => 21,  50 => 10,  43 => 8,  41 => 7,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 52,  168 => 72,  164 => 59,  162 => 48,  154 => 58,  149 => 51,  147 => 58,  144 => 42,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 37,  116 => 41,  112 => 42,  109 => 34,  106 => 30,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 25,  82 => 24,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 7,  48 => 6,  45 => 5,  42 => 7,  39 => 4,  36 => 5,  33 => 3,  30 => 7,);
    }
}
