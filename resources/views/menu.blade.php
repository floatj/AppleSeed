<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AppleSeed</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="#">統計圖表<span class="sr-only">(current)</span></a></li>-->
                <li><a href="/">Dashboard</a></li>
                <!--所有信件-->
            <!--
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">信件 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">常用分類</li>
            <li><a href="#">信件清單</a></li>
            <li><a href="#">統計圖表</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">其他分類</li>
            <li><a href="#">信件清單（其他分類）</a></li>
            <li><a href="#">統計圖表（其他分類）</a></li>
          </ul>
        </li>
        -->
            <!--
        <li><a href="#">所有信件</a></li>
        <li><a href="#">統計圖表</a></li>
        -->
                <!--一般信件-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dictionary<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{action('DictController@index')}}">List</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">API<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">List</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Config<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">DB</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>