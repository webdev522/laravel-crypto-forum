<div class="col-md-2">
    <div class="row" style="background-color: #b2d3ff;margin-bottom: 15px;">
        <form class="navbar-form navbar-left" style="">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit" class="" >
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <section class="left-menu">
            <div class="top">
                <p><span class="glyphicon glyphicon-btc"></span>&nbsp Currencies </p>
                <ul >

                    <li><a id="bit_coin" href="#">Coins</a></li>
                    <li><a href="#">Assets</a></li>
                    <li><a href="#">Markets</a></li>
                </ul>
            </div>
            <div class="bottom">
                <p> <i class="fa fa-commenting-o" aria-hidden="true"></i> &nbspFourms</p>
                <ul style="">
                    @foreach($forums as $forum)
                        <li><a href="{{route('home',$forum->name)}}">{{$forum->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>

</div>