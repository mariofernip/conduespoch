<?php

/* academicoBundle:Default:requisitoestudiante.html.twig */
class __TwigTemplate_12193f6c575f231d05fb8613cefd879dd755b0663b96cd2966c20932480594ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'choice_widget' => array($this, 'block_choice_widget'),
            'id' => array($this, 'block_id'),
            'title' => array($this, 'block_title'),
            'article' => array($this, 'block_article'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'aside' => array($this, 'block_aside'),
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
    public function block_choice_widget($context, array $blocks = array())
    {
        // line 4
        ob_start();
        // line 5
        echo "    ";
        if ((isset($context["expanded"]) ? $context["expanded"] : $this->getContext($context, "expanded"))) {
            // line 6
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
        ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 8
                echo "            ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'widget');
                echo "
        ";
                // line 9
                echo "  
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "        </div>
    ";
        } else {
            // line 13
            echo "    <select ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
                echo " multiple=\"multiple\"";
            }
            echo ">
        ";
            // line 14
            if ((!(null === (isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value"))))) {
                // line 15
                echo "            <option value=\"\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value"))), "html", null, true);
                echo "</option>
        ";
            }
            // line 17
            echo "        ";
            if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"))) > 0)) {
                // line 18
                echo "            ";
                $context["options"] = (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"));
                // line 19
                echo "            ";
                $this->displayBlock("widget_choice_options", $context, $blocks);
                echo "
            ";
                // line 20
                if (((twig_length_filter($this->env, (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"))) > 0) && (!(null === (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")))))) {
                    // line 21
                    echo "                <option disabled=\"disabled\">";
                    echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")), "html", null, true);
                    echo "</option>
            ";
                }
                // line 23
                echo "        ";
            }
            // line 24
            echo "        ";
            $context["options"] = (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"));
            // line 25
            echo "        ";
            $this->displayBlock("widget_choice_options", $context, $blocks);
            echo "
    </select>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 31
    public function block_id($context, array $blocks = array())
    {
        echo "estudiante";
    }

    // line 33
    public function block_title($context, array $blocks = array())
    {
        echo "Requisito del estudiante";
    }

    // line 35
    public function block_article($context, array $blocks = array())
    {
        // line 36
        echo "
<h1>";
        // line 37
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

<article>
    ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["estudiante"]) ? $context["estudiante"] : $this->getContext($context, "estudiante")));
        foreach ($context['_seq'] as $context["_key"] => $context["persona"]) {
            // line 41
            echo "        Nombre : ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["persona"]) ? $context["persona"] : $this->getContext($context, "persona")), "nombre"), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["persona"]) ? $context["persona"] : $this->getContext($context, "persona")), "apellido"), "html", null, true);
            echo "
        <br>
        CI : ";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["persona"]) ? $context["persona"] : $this->getContext($context, "persona")), "cedula"), "html", null, true);
            echo "
        <br>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['persona'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "</article>

";
        // line 49
        echo "
<article>
    ";
        // line 51
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 59
        echo "</article>



";
        // line 64
        echo "
<form action=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("estudiante_requisito");
        echo "\" method=\"post\"";
        echo         // line 66
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
    ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
</form>




";
    }

    // line 51
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        ob_start();
        // line 53
        echo "       ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["requisito"]) ? $context["requisito"] : $this->getContext($context, "requisito")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 54
            echo "            <br>
            <input type=\"checkbox\"/>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 58
        echo "    ";
    }

    // line 85
    public function block_aside($context, array $blocks = array())
    {
        // line 86
        echo "
       
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:requisitoestudiante.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 86,  229 => 85,  225 => 58,  222 => 57,  214 => 55,  211 => 54,  206 => 53,  203 => 52,  200 => 51,  188 => 67,  184 => 66,  181 => 65,  178 => 64,  172 => 59,  170 => 51,  166 => 49,  162 => 46,  153 => 43,  145 => 41,  141 => 40,  135 => 37,  132 => 36,  129 => 35,  123 => 33,  117 => 31,  107 => 25,  104 => 24,  101 => 23,  95 => 21,  93 => 20,  88 => 19,  85 => 18,  82 => 17,  76 => 15,  74 => 14,  66 => 13,  62 => 11,  55 => 9,  50 => 8,  46 => 7,  41 => 6,  38 => 5,  36 => 4,  33 => 3,);
    }
}
