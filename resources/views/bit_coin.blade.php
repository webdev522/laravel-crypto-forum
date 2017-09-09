<div class="row" >
    <div class="table-responsive">

        <table class="table table-currency table-sm" id="mytable">

            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Market Cap</th>
                <th id="sl">
                    <a  href="javascript:void(0)" rel="me"><i class="fa fa-chevron-up"></i> <span>Price</span></a>

                </th>
                <th>Circulating Supply</th>
                <th>Volume (24h)</th>
                <th>%Change (24h)</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.coinmarketcap.com/v1/ticker/?limit=10",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "postman-token: 91710649-3df9-b934-1b50-f256442d497b"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                //echo $response;
            }
            $json = json_decode($response, true);
            foreach($json as $item)
            {


            ?>
            <!-- row1 start-->
            <tr>
                <td><?php echo $item['rank']; ?></td>
                <td class="img-name"> <img src="https://files.coinmarketcap.com/static/img/coins/16x16/{{$item['id']}}.png" alt=""> <a href="{{route('home',$item['symbol'])}}"><?php echo $item['name']; ?></a></td>
                <td> $<?php echo $item['market_cap_usd']; ?></td>
                <td> <a href="#"> $<?php echo $item['price_usd']; ?></a></td>
                <td> <a href="#"> <?php echo $item['24h_volume_usd']; ?> XBC *</a></td>
                <td> <a href="#">$<?php echo $item['price_usd']; ?></a></td>
                <td><?php echo $item['percent_change_24h']; ?>%</td>
            </tr> <!-- row 1 end -->
            <?php } ?>
            </tbody>


        </table>

    </div>
</div> <!-- row -->