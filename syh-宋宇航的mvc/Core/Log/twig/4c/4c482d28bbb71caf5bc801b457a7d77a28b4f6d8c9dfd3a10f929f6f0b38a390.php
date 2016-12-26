<?php

/* layout.html */
class __TwigTemplate_25c43fe593562687e3481759c2c90a8b89d93384de665e09904ee3e901963029 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html> 
<html> 
<head> 
  <meta charset=\"utf-8\"> 
  <title>布局文件</title> 
</head>
<body>
  <header>这是公共头文件</header>
  <content>
\t";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "  </content>\t\t\t
 <footer>这是尾部</footer> 
</body>
<script type=\"text/javascript\">
</script>
</html> ";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  45 => 11,  42 => 10,  33 => 12,  31 => 10,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html> 
<html> 
<head> 
  <meta charset=\"utf-8\"> 
  <title>布局文件</title> 
</head>
<body>
  <header>这是公共头文件</header>
  <content>
\t{% block content %}
\t{% endblock %}
  </content>\t\t\t
 <footer>这是尾部</footer> 
</body>
<script type=\"text/javascript\">
</script>
</html> ", "layout.html", "D:\\phpStudy\\WWW\\web\\mvc\\App\\Views\\layout.html");
    }
}
