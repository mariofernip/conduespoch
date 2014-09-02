<?php

/* academicoBundle:Default:evaluacion.html.twig */
class __TwigTemplate_3d9488062a615e3eae2cfd5507050119ec98d87f85fe49869dbbe0261a340c2d extends Twig_Template
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
        echo " Perfil de docente ";
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
        echo "<strong><legend>Notas del estudiante</legend></strong>
<br>
<strong>Cédula:&nbsp;</strong>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "matricula"), "estudiante"), "cedula"), "html", null, true);
        echo "<br>
<strong>Nombres:&nbsp;</strong>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "matricula"), "estudiante"), "nombre"), "html", null, true);
        echo "<br>
<strong>Apellidos:&nbsp;</strong>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "matricula"), "estudiante"), "apellido"), "html", null, true);
        echo "<br><br>
<a class='activate_modal' name='modal_window' id=\"foos\" h  >Evaluar</a>
<div id='mask' class='close_modal'></div>
                        <div id='modal_window' class='modal_window'>
                            <form  id=\"login\" method=\"post\" ";
        // line 14
        echo         // line 15
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'enctype');
        echo ">

                                      <fieldset>                  
                            ";
        // line 19
        echo "                            ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "promedio"), 'row');
        echo "
                            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "mesevaluacion"), 'label', array("label" => "Mes evaluado:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "mesevaluacion"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "mesevaluacion"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "              <br>                                        
                            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tiponota"), 'label', array("label" => "Nota de:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tiponota"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tiponota"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo " <br>   
                            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "descripcion"), 'label', array("label" => "Descripción:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "descripcion"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "descripcion"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "    
                                          </fieldset>   


         ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
                                          <input  class=\"boton\" type=\"submit\" value=\"Guardar\"/>
                                      </form>

                                  </div>

";
    }

    // line 33
    public function block_aside($context, array $blocks = array())
    {
        // line 34
        $context["docente"] = "docente";
        // line 35
        echo "
<p align=\"center\"><a class=\"boton\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("portada", array("role" => (isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")))), "html", null, true);
        echo "\">INICIO</a></p>
    ";
        // line 37
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
<strong><p align=\"left\">Materias</p></strong>
<div id=\"relacionadas\">
    <ul>
    ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materiasdoc"]) ? $context["materiasdoc"] : $this->getContext($context, "materiasdoc")));
        foreach ($context['_seq'] as $context["_key"] => $context["matdoc"]) {
            // line 42
            echo "            <li><a class=\"boton\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_listaest_x_materia", array("materia" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "materia"), "id"), "nivel" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "nivel"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "nivel")), "html", null, true);
            echo "&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "materia"), "nombre")), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['matdoc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "
    </ul>
</div>
";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
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
                    \$('.modal_window').each(function(){
        
                        //get the height and width of the modal
                        var modal_height = \$(this).outerHeight();
                        var modal_width = \$(this).outerWidth();
        
                        //calculate top and left offset needed for centering
                        var top = (window_height-modal_height)/2;
                        var left = (window_width-modal_width)/2;
        
                        //apply new top and left css values 
                        \$(this).css({'top' : top , 'left' : left});
        
                    });

        
                        \$('.activate_modal').click(function(){
                
                              //get the id of the modal window stored in the name of the activating element       
                              var modal_id = \$(this).attr('name');
              
                              //use the function to show it
                              show_modal(modal_id);
              
                        });
        
                        \$('.close_modal').click(function(){
            
                            //use the function to close it
                            close_modal();
            
                        });
        
                    });
    
                    //THE FUNCTIONS
    
                    function close_modal(){
        
                        //hide the mask
                        \$('#mask').fadeOut(500);
        
                        //hide modal window(s)
                        \$('.modal_window').fadeOut(500);
        
                    }
                    function show_modal(modal_id){
    
                        //set display to block and opacity to 0 so we can use fadeTo
                        \$('#mask').css({ 'display' : 'block', opacity : 0});
        
                        //fade in the mask to opacity 0.8 
                        \$('#mask').fadeTo(500,0.8);
         
                         //show the modal window
                        \$('#'+modal_id).fadeIn(500);
        
                    }
    
                    </script>


";
    }

    // line 133
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 134
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
                    <style>

                            /* ESTILO PARA LA VENTANA MODAL */

                            #mask{ 
                                position:absolute; /* important */
                                top:0px; /* start from top */
                                left:0px; /* start from left */
                                height:100%; /* cover the whole page */
                                width:100%;  /* cover the whole page */
                                display:none; /* don't show it '*/          

                                /* styling bellow */
                                background-color: black; 
                            }

                            .modal_window{
                                position:absolute; /* important so we can position it on center later */
                                display:none; /* don't show it */

                                /* styling bellow */
                                color:white;
                            }

                            /* style a specific modal window  */
                            #modal_window{
                                padding:50px;
                                border:1px solid gray;
                                background: #246493;
                                color:black;
                            }
                            /* CIERRE BLOQUE ESTILO PARA LA VENTANA MODAL */  

                        </style>



                        
   ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:evaluacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 61,  150 => 60,  127 => 46,  124 => 45,  114 => 34,  76 => 26,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 34,  81 => 30,  34 => 6,  213 => 62,  206 => 62,  195 => 68,  186 => 58,  178 => 52,  170 => 51,  167 => 50,  161 => 48,  146 => 41,  134 => 42,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 59,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 49,  107 => 36,  61 => 19,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 58,  135 => 53,  119 => 36,  102 => 29,  71 => 17,  67 => 14,  63 => 22,  59 => 14,  38 => 6,  94 => 32,  89 => 31,  85 => 21,  75 => 18,  68 => 15,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 32,  78 => 21,  46 => 8,  27 => 4,  44 => 10,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 57,  171 => 61,  166 => 50,  163 => 45,  158 => 62,  156 => 45,  151 => 63,  142 => 59,  138 => 36,  136 => 39,  121 => 46,  117 => 44,  105 => 40,  91 => 22,  62 => 14,  49 => 12,  24 => 1,  25 => 3,  19 => 1,  79 => 20,  72 => 24,  69 => 23,  47 => 11,  40 => 6,  37 => 5,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 37,  120 => 43,  115 => 43,  111 => 33,  108 => 33,  101 => 32,  98 => 33,  96 => 24,  83 => 25,  74 => 19,  66 => 16,  55 => 12,  52 => 8,  50 => 12,  43 => 7,  41 => 8,  35 => 4,  32 => 3,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 66,  176 => 64,  173 => 52,  168 => 72,  164 => 59,  162 => 48,  154 => 49,  149 => 42,  147 => 44,  144 => 42,  141 => 48,  133 => 50,  130 => 41,  125 => 44,  122 => 32,  116 => 35,  112 => 34,  109 => 41,  106 => 30,  103 => 32,  99 => 38,  95 => 37,  92 => 36,  86 => 31,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 10,  57 => 12,  54 => 10,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
