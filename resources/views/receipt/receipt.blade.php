
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>

	<style type="text/css">
		/* reset */
	@media print {
				  #printPageButton {
				    display: none;
				  }
				}
*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 6.4in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 2em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { text-align: center; font-size: 125%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left;  font-size: 75%;font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}
.center{
	text-align: center;
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid #5a5656;
    border-radius: 4px;
}
@page { margin: 0; }
	</style>
	<body>
		<header>
			<h1>Receipt </h1>
			
			<address >
				<p>Apni Soceity</p>
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Resident : {{ @$owner->owner_name}}</p>
				<p>Address : {{ @$owner->owner_address}}</p>
				<p>Mobile No : {{ @$owner->mobile_no}}</p>

			    <h4 class="mt-4" style="margin-top: 20px;font-size: 18px;color: #707070;text-decoration: underline;">* <?= ($status==0) ? 'Provisional' : 'Actual' ?> Receipt </h4>
			</address>
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >{{ $receipt_code}}</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >{{ date('d M Y',strtotime($receipt_date))}}</span></td>
				</tr>
				<!-- <tr>
					<th><span >Amount Due</span></th>
					<td><span id="prefix" >Rs.</span>{{  $amount + $unit['out_standing_amount']}}<span></span></td>
				</tr> -->
				<tr>
					<th><span >Receipt Type</span></th>
					<td><span >{{ $receipt_type['receipt_name'] }}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Project</span></th>
						<th><span >Block</span></th>
						<th><span >Unit</span></th>
						<th><span >Monthly</span></th>
						<th><span >Receipt Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><span >{{ $project['project_name']}}</span></td>
						<td class="center"><span >{{ $block['block_name']}}</span></td>
						<td class="center"><span >{{ $unit['unit_name']}}</span></td>
						<td ><span >{{ $unit_category['monthly_amount']}}</span></td>
						<td><span>{{ $amount}}</span></td>
					</tr>
					<tr>
						<th colspan="5">Amount in Words : <span><?= Number2Words($amount)  ?> Only</span> </th>
					</tr>
				</tbody>
			</table>

			<table class="balance">
				<tr>
					<th><span >Balance Amount :</span></th>
					<td><span data-prefix>Rs.</span><span><?= $unit['out_standing_amount'] ?></span></td>
				</tr>
			</table>
		</article>
		<aside style="margin-bottom: 10px">
			<h1><span  >Notes</span></h1>
			<div >
				<p>Maintenance Charges is due at the start of each Month. Therefore it is an advance amount.</p>
			</div>
		</aside>
        <button border class="btn btn-success" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
         <button border class="btn btn-default" id="printPageButton" onclick="window.close()"><i class="fa fa-print"></i> Close</button>

	
	</body>
	    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
</html>