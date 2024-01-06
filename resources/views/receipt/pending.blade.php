
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
	</head>

	<style type="text/css">

h1,.p{ font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }


/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 1px;border-color: #fff; }
/*th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }*/
th { background: #EEE; border-color: #BBB;font-size: 12px;font-weight: bold; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 6.4in; margin: 0 auto; overflow: hidden; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }




table.meta { float: left; width: 100%;border-color:#fff;}
.meta th,td {border-color:#fff;  }

article{background-color: blue;width:100%;}






@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
	
.balance td { text-align: right; }
.balance  { float: right; }
}
.inventory th{
	background-color: #ccc;
	padding: 10px !important
}
.center{
	text-align: center;
}.right{
	text-align: right;
}.left{
	text-align: left;
}
.print_by{

	float:left;
	color:grey;
	font-weight: unset;
    /*border: 0px;*/

}
.print_by strong{}
@page { margin: 0; }
	</style>
	<body>

		<!-- <div class="print_by right"><strong class="left">Document Print By : System Generated </strong> | <strong class="right">Document Print date :{{date(NOW())}}</strong></div>
 -->
		<table class="print_by" >
			<tr>
					<td width="130px"><strong class="left">Document Print By :  </strong></td>
					<td class="left"><strong >System Generated</strong></td>
					<td></td>
					<td class="right"><span >Document Print date  :</span></td>
					<td class="center"><span >{{date(NOW())}}</span></td>
				</tr>
			</table>


		<hr>
		<!-- <div class="print_by">Print By : Muhammad Azeem Tariq</div> -->
		<header>
			<h1 style="font-family: cursive;">Apni Soceity <br> Receipt Voucher</h1>
			<address >
			
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
		
		
			

			    <h4 class="mt-4" style="margin-top: 20px;font-size: 18px;color: #707070;text-decoration: underline;">Invoice Detail</h4>
			
			<table class="meta">
				<tr>
					<th width="110px"><span >Resident Name : </span></th>
					<td class="left"><span >{{ @$owner->owner_name}}</span></td>
					<td></td>
					<th class="right"><span >Invoice # :</span></th>
					<td class="center"><span >{{ $receipt_code}}</span></td>
				</tr>
				<tr>
					<th ><span >Address : </span></th>
					<td><span >{{ @$owner->owner_address}}</span></td>
					<td></td>
					<th class="right"><span >Invoice Date :</span></th>
					<td class="center"><span >{{ date('d M Y',strtotime($receipt_date))}}</span></td>
				</tr>
				<tr>
					<th ><span >Mobile #  : </span></th>
					<td><span >{{ @$owner->mobile_no}}</span></td>
					<td></td>
					<th class="right"><span >Receipt Type : </span></th>
					<td class="center"> <span >{{ $receipt_type['receipt_name'] }}</span></td>
				</tr>
			</table>
	        
		</article>
    <h4 class="mt-4" style="margin-top: 20px;font-size: 18px;color: #707070;text-decoration: underline;">* <?= ($status==0) ? 'Provisional' : 'Actual' ?> Receipt </h4>
 <h4 class="mt-4" style="margin-top: 20px;font-size: 18px;color: #707070;text-decoration: underline;text-align: center;"> Receipt Detail</h4>
			
			<table class="inventory" style="margin-top: 20px">
				<thead>
					<tr>
						<th class="center"><span >Project Name</span></th>
						<th class="center"><span >Block</span></th>
						<th class="center"><span >Unit</span></th>
						<th class="center"><span >Monthly Amount</span></th>
						<th class="center"><span >Receipt Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><span >{{ $project['project_name']}}</span></td>
						<td class="center"><span >{{ $block['block_name']}}</span></td>
						<td class="center"><span >{{ $unit['unit_name']}}</span></td>
						<td class="right"><span >{{ $unit_category['monthly_amount']}}</span></td>
						<td class="right"><span>{{ $amount}}</span></td>
					</tr>
					<tr>
						<th class="center" colspan="6">Amount in Words : <span><?= Number2Words($amount)  ?> Only</span> </th>
					</tr>
				</tbody>
			</table>


			<table class="right" >
				<tr>
					<th width="90%"><span >Balance Amount :</span></th>
					<th width="10%"><span data-prefix>Rs.</span><span><?= $unit['out_standing_amount'] ?></span></th>
				</tr>
			</table>
		<aside style="margin-bottom: 5px">
			<h1 class="left"><span  >Notes :</span></h1>
			<div >
				<p>Maintenance Charges is due at the start of each Month. Therefore it is an advance amount.</p>
			</div>
		</aside>
       
	
	</body>
</html>