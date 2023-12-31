<!DOCTYPE html>
<html>
<head>
  <title> </title>
</head>
<style type="text/css">
  @page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}

body{
  background:#EEE;
  /* font-size:0.9em !important; */
}

.bigfont {
  font-size: 3rem !important;
}
.invoice{
  width:970px !important;
  margin:50px auto;
}

.logo {
  float:left;
  padding-right: 10px;
  margin:10px auto;
}

dt {
float:left;
}
dd {
float:left;
clear:right;
}

.customercard {
  min-width:65%;
}

.itemscard {
  min-width:98.5%;
  margin-left:0.5%;
}

.logo {
  max-width: 5rem;
  margin-top: -0.25rem;
}

.invDetails {
  margin-top: 0rem;
}

.pageTitle {
  margin-bottom: -1rem;
}

</style>
<body>
<div class="container invoice">
  <div class="invoice-header">
    <div class="ui left aligned grid">
      <div class="row">
        <div class="left floated left aligned six wide column">
          <div class="ui">
            <h1 class = "ui header pageTitle">Invoice <small class = "ui sub header">With Credit</small></h1>
            <h4 class="ui sub header invDetails">NO: 554775/R1 | Date: 01/01/2015</h4>
          </div>
        </div>
        <div class="right floated left aligned six wide column">
          <div class="ui">
            <div class="column two wide right floated">
              <img class="logo" src="https://scontent.fmel5-1.fna.fbcdn.net/v/t1.0-9/10358691_1595827163984651_6845505980791568353_n.png?_nc_cat=109&_nc_ohc=We4wwT6M2Q0AX8qY8-b&_nc_ht=scontent.fmel5-1.fna&oh=69bd30fc152063c470afd928919c8734&oe=5E94664A" />
              <ul class="">
                <li><strong>RCJA Australia</strong></li>
                <li>Lorem Ipsum</li>
                <li>2 Alliance Lane VIC</li>
                <li>info@rcja.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ui segment cards">
    <div class="ui card">
      <div class="content">
        <div class="header">Company Details</div>
      </div>
      <div class="content">
        <ul>
          <li> <strong> Name: RCJA </strong> </li>
          <li><strong> Address: </strong> 1 Unknown Street VIC</li>
          <li><strong> Phone: </strong> (+61)404123123</li>
          <li><strong> Email: </strong> admin@rcja.com</li>
          <li><strong> Contact: </strong> John Smith</li>
        </ul>
      </div>
    </div>
    <div class="ui card customercard">
      <div class="content">
        <div class="header">Customer Details</div>
      </div>
      <div class="content">
        <ul>
          <li> <strong> Name: RCJA </strong> </li>
          <li><strong> Address: </strong> 1 Unknown Street VIC</li>
          <li><strong> Phone: </strong> (+61)404123123</li>
          <li><strong> Email: </strong> admin@rcja.com</li>
          <li><strong> Contact: </strong> John Smith</li>
        </ul>
      </div>
    </div>

    <div class="ui segment itemscard">
      <div class="content">
        <table class="ui celled table">
          <thead>
            <tr>
              <th>Item / Details</th>
              <th class="text-center colfix">Unit Cost</th>
              <th class="text-center colfix">Sum Cost</th>
              <th class="text-center colfix">Discount</th>
              <th class="text-center colfix">Tax</th>
              <th class="text-center colfix">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Lorem Ipsum Dolor
                <br>
                <small class="text-muted">The best lorem in town, try it now or leave forever</small>
              </td>
              <td class="text-right">
                <span class="mono">$1,000.00</span>
                <br>
                <small class="text-muted">Before Tax</small>
              </td>
              <td class="text-right">
                <span class="mono">$18,000.00</span>
                <br>
                <small class="text-muted">18 Units</small>
              </td>
              <td class="text-right">
                <span class="mono">- $1,800.00</span>
                <br>
                <small class="text-muted">Special -10%</small>
              </td>
              <td class="text-right">
                <span class="mono">+ $3,240.00</span>
                <br>
                <small class="text-muted">VAT 20%</small>
              </td>
              <td class="text-right">
                <strong class="mono">$19,440.00</strong>
                <br>
                <small class="text-muted mono">$16,200.00</small>
              </td>
            </tr>

            <tr>
              <td>
                Sit Amet Dolo
                <br>
                <small class="text-muted">Now you may sit</small>
              </td>
              <td class="text-right">
                <span class="mono">$120.00</span>
                <br>
                <small class="text-muted">Before Tax</small>
              </td>
              <td class="text-right">
                <span class="mono">$240.00</span>
                <br>
                <small class="text-muted">2 Units</small>
              </td>
              <td class="text-right">
                <span class="mono">- $0.00</span>
                <br>
                <small class="text-muted">-</small>
              </td>
              <td class="text-right">
                <span class="mono">+ $72.00</span>
                <br>
                <small class="text-muted">VAT:20% S:10%</small>
              </td>
              <td class="text-right">
                <strong class="mono">$312.00</strong>
                <br>
                <small class="text-muted mono">$240.00</small>
              </td>
            </tr>
          </tbody>
         <tfoot class="full-width">
    <tr>
      <th> Total: </th>
      <th colspan="2"></th>
      <th colspan = "1"> $500 </th>
      <th colspan = "1"> $800 </th>
      <th colspan = "1"> $20000.00 </th>
    </tr>
  </tfoot>
        </table>

      </div>
    </div>

    <div class="ui card">
      <div class="content center aligned text segment">
        <small class="ui sub header"> Amount Due (AUD): </small>
        <p class="bigfont"> $5000.25 </p>
      </div>
    </div>
        <div class="ui card">
      <div class="content">
        <div class="header">Payment Details</div>
      </div>
      <div class="content">
        <p> <strong> Account Name: </strong> "RJCA" </p>
        <p> <strong> BSB: </strong> 111-111 </p>
        <p> <strong>Account Number: </strong> 1234101 </p>
      </div>
    </div>
    <div class="ui card">
      <div class="content">
        <div class="header">Notes</div>
      </div>
      <div class="content">
        Payment is requested within 15 days of recieving this invoice.
      </div>
    </div>
  </div>
</div>
</body>
</html>