<?php

/* academicoBundle:Default:listaestudiantesmatriculadosasistecia.html.twig */
class __TwigTemplate_20a2aa596c85223841ecf1bcb7db97d4325f723491e316ef171fc1141bc7b061 extends Twig_Template
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
        echo " ASISTENCIA ";
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
        echo "<section id=\"menu_inspector\">
        ";
        // line 7
        $this->env->loadTemplate("academicoBundle:Default:menu_inspector.html.twig")->display(array_merge($context, array("niveles" => (isset($context["niveles"]) ? $context["niveles"] : $this->getContext($context, "niveles")), "listamaterias" => (isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")))));
        // line 8
        echo "</section>
<p style=\"text-align: center ; color: #0035C7 \"><strong>INGRESO DE ASISTENCIAS:&nbsp;<label style=\"color: #090\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nombre"), "html", null, true);
        echo "</label></strong></p>
        

<div id=\"dt_example\">
    <div id=\"demo\">
    ";
        // line 14
        if (((isset($context["sd"]) ? $context["sd"] : $this->getContext($context, "sd")) == 1)) {
            // line 15
            echo "        <form name=\"diurna\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formsecciones"]) ? $context["formsecciones"] : $this->getContext($context, "formsecciones")), 'enctype');
            echo ">
            ";
            // line 16
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formsecciones"]) ? $context["formsecciones"] : $this->getContext($context, "formsecciones")), 'form_start');
            echo "
        <table class=\"display\" id=\"example\">
            <thead>
                <tr >
                    ";
            // line 25
            echo "                    <th>Seccion / Cédula / Estudiante</th>
                    <th>Faltas Justificadas</th>
                    <th>Faltas Injustificadas</th>
                    <th>Atrasos</th>
                    <th>Promedio</th>
                 </tr>
                </thead>
                            
        ";
            // line 34
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["formsecciones"]) ? $context["formsecciones"] : $this->getContext($context, "formsecciones")), "faltasjustificadas"));
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 35
                echo "<tbody>
    <tr>            
        <td style=\"vertical-align:middle; text-align: left\">";
                // line 37
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "materiaasignada"), 'widget');
                echo "</td>                
        <td style=\"vertical-align:middle; text-align: center\">";
                // line 38
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "faltasjustificadas"), 'errors');
                echo " ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "faltasjustificadas"), 'widget');
                echo " </td>
        <td style=\"vertical-align:middle; text-align: center\">";
                // line 39
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "faltasinjustificadas"), 'widget');
                echo "</td>
        <td style=\"vertical-align:middle; text-align: center\">";
                // line 40
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "atrasos"), 'widget');
                echo "</td>
        <td style=\"vertical-align:middle; text-align: center\">";
                // line 41
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "promediofinal"), 'widget');
                echo "</td>
        
    </tr>
</tbody>                       
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "     
                        
        </table>
            <div class=\"paginacion\">
                        ";
            // line 50
            echo $this->env->getExtension('knp_pagination')->render((isset($context["secciones"]) ? $context["secciones"] : $this->getContext($context, "secciones")));
            echo "
                     </div>
    <input type=\"submit\" value=\"guardar\" class=\"boton\" >       
    ";
            // line 53
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formsecciones"]) ? $context["formsecciones"] : $this->getContext($context, "formsecciones")), 'form_end');
            echo "            
    
    </form>
            ";
        } else {
            // line 57
            echo "        <h1>No hay estudiantes</h1>
    ";
        }
        // line 59
        echo "    </div>
</div>
<br>

";
    }

    // line 64
    public function block_aside($context, array $blocks = array())
    {
        // line 65
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <p style=\"text-align: center\">Curso actual:</p>
    <p style=\"text-align: left; color: #090\"><strong>";
        // line 67
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["curso"]) ? $context["curso"] : $this->getContext($context, "curso"))), "html", null, true);
        echo "</strong></p>
    <strong><p align=\"center\">Materias:</p></strong>
    <div id=\"relacionadas\">
        <ul>
       ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 72
            echo "                ";
            // line 73
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_lista_matriculados_x_materia_x_secciones", array("materias" => $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "materia"), "id"), "nivel" => $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nivel"), "id"))), "html", null, true);
            echo "\" class=\"boton\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "materia"), "nombre")), "html", null, true);
            echo "</a></li>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "            </ul>
        </div>
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
        // line 82
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

    // line 113
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 114
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
        // line 115
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 116
        echo "<style>
   
  input[type=\"number\"] {
   width:50px;
}
</style>



   ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:listaestudiantesmatriculadosasistecia.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 29,  137 => 34,  70 => 20,  185 => 50,  172 => 71,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 67,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 25,  236 => 113,  226 => 67,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 41,  84 => 21,  97 => 37,  81 => 22,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 65,  152 => 43,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 24,  77 => 21,  58 => 11,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 31,  107 => 39,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 42,  143 => 36,  135 => 53,  119 => 28,  102 => 29,  71 => 16,  67 => 17,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 24,  85 => 23,  75 => 18,  68 => 19,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 35,  88 => 34,  78 => 25,  46 => 6,  27 => 4,  44 => 6,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 53,  136 => 36,  121 => 46,  117 => 28,  105 => 25,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 22,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 41,  111 => 40,  108 => 33,  101 => 38,  98 => 33,  96 => 28,  83 => 25,  74 => 21,  66 => 15,  55 => 11,  52 => 11,  50 => 8,  43 => 5,  41 => 8,  35 => 4,  32 => 2,  29 => 3,  209 => 82,  203 => 59,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 59,  147 => 39,  144 => 42,  141 => 48,  133 => 35,  130 => 41,  125 => 30,  122 => 31,  116 => 30,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 37,  92 => 36,  86 => 22,  82 => 29,  80 => 19,  73 => 20,  64 => 14,  60 => 12,  57 => 12,  54 => 9,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
