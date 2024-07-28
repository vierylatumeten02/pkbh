<?php

$today_highlight = App\Models\NewsPost::where('status', 1)
                                       ->where('today_highlight', 1)
                                       ->limit(7)
                                       ->get();

?>

<div class="top-scroll-section5">
    <div class="container">
        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span>Today Highlight</span>
                            </div>
                        </div>
                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">
                                @foreach($today_highlight as $item)
                                    <a href="#">
                                        <img src="{{ asset('frontend/assets/images/favicon.gif') }}" alt="Logo" title="Logo" width="30px" height="auto">
                                        {{ $item->news_title }}
                                    </a>
                                @endforeach
                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
