
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

	</style>
	<body>
		<header>
			<h1>Recepit Voucher</h1>
			<address contenteditable>
				<p><?= $owner->owner_name ?? '' ?></p>
				<p><?= $owner->owner_address ?? '' ?></p>
				<p><?=  $owner->mobile_no ?? '' ?></p>
			</address>
			
		</header>
		<article>
			<h1>Recipient</h1>
			<address >
				<p>Apni Soceity</p>
			</address>
			<div class="col-md-12">
			<div class="col-md-6">
				
			</div>

			<div class="col-md-6" style="float: right;width: 200px">
				<table class="meta" border="1" cellpadding="0" cellspacing="1">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span ><?= $receipt_code ?></span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span ><?= date('d M Y',strtotime($receipt_date)) ?></span></td>
				</tr>
				<tr>
					<th><span >Amount Due</span></th>
					<td><span id="prefix" >Rs.</span><?= $amount ?><span></span></td>
				</tr>
			</table>
			</div>
		</div>

			
			<table class="inventory" >
				<thead>
					<tr>
						<th><span >Project</span></th>
						<th><span >Block</span></th>
						<th><span >Unit</span></th>
						<th><span >Monthly</span></th>
						<th><span >Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><span ><?= $project['project_name'] ?></span></td>
						<td class="center"><span ><?= $block['block_name'] ?></span></td>
						<td class="center"><span ><?= $unit['unit_name'] ?></span></td>
						<td ><span ><?= $unit_category['monthly_amount'] ?></span></td>
						<td><span><?= $amount ?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>Rs.</span><span>600.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<!-- <h1><span >Additional Notes</span></h1>
			<div >
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div> -->
		</aside>
        <button border class="btn btn-default" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

		<script type="text/javascript">
			

		

		</script>
	</body>
</html>