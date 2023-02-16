<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A SIMPLE TAX CALCULATOR</title>
  <!-- <link href="./css/style.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <br>
      <div class="container text-center">
        <div class="card">
          <div class="card-header">
            <h2><b>2023 Annual Tax Calculator</b></h2>
          </div>
          <div class="card-body">
            <br>
            <form action="" method="post" name="Login_Form">
              <?php if (isset($msg)) { ?>
                <div><?php echo $msg; ?></div>
              <?php } ?>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default"> <b>Input Salary</b> </span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="salary" required="true" /> <br>
                  </div>
                  <br>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default"> <b>Subscription</b> </span>
                    <div class="input-group-text"> <input class="form-check-input mt-0" type="radio" name="subscription" id="monthly" value="monthly" checked> <label class="form-check-label" for="flexRadioDefault1"> 
                        &nbsp; Monthly
                      </label>
                    </div>
                    <div class="input-group-text">
                      <input class="form-check-input mt-0" type="radio" name="subscription" id="biMonthly" value="bimonthly"> <label class="form-check-label" for="flexRadioDefault1">
                        &nbsp; Bi-Monthly
                      </label>
                    </div>

                  </div>
                  </br>

                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" name="Submit" type="submit"> <b>Compute Tax</b></button>
                  </div>
            </form>
          </div>
          <div class="col-md-3"></div>

        </div>
        <br><br>


        <?php
        $salary = isset($_POST["salary"]) ? $_POST["salary"] : 0;
        $subscription = isset($_POST["subscription"]) ? $_POST["subscription"] : "";
        $gross = $subscription == "bimonthly" ? $salary * 2 * 12 : $salary * 12;

        if ($gross <= 250000) {
          $rate = 0;
        } else if ($gross > 250000 && $gross <= 400000) {
          $rate = ($gross - 250000) * .20;
        } else if ($gross > 400000 && $gross <= 800000) {
          $rate = 30000 + (($gross - 400000) * .25);
        } else if ($gross > 800000 && $gross <= 2000000) {
          $rate = 130000 + (($gross - 800000) * .30);
        } else if ($gross > 2000000 && $gross <= 8000000) {
          $rate = 490000 + (($gross - 2000000) * .32);
        } else if ($gross > 8000000) {
          $rate = 2410000 + (($gross - 8000000) * .35);
        }

        echo "
                    <div class='row'>
                    <div class='col-md-4'>
                      <div class='card text-center'>
                      <div class='card-header'>
                        <b>Annual Salary</b>
                      </div>
                      <div class='card-body'>
                        <h5 class='card-title'>" . number_format($gross, 2, '.', ',') . "</h5>
                      </div>
                    </div>
                    </div>

                    <div class='col-md-4'>
                    <div class='card text-center'>
                    <div class='card-header'>
                      <b>EST. Annual Tax</b>
                    </div>
                    <div class='card-body'>
                      <h5 class='card-title'>" . number_format($rate, 2, '.', ',') . "</h5>
                    </div>
                  </div>
                  </div>

                  <div class='col-md-4'>
                  <div class='card text-center'>
                  <div class='card-header'>
                  <b>EST. Monthly Tax</b>
                  </div>
                  <div class='card-body'>
                    <h5 class='card-title'>" . number_format($rate / 12, 2, '.', ',') . "</h5>
                  </div>
                </div>
                </div>
                </div>"

        ?>
        <br><br>
        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" style="background:white;color: #273746  "type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <b>How to Compute Annual Tax</b>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse collapse"  style="background: #f7f9f9 " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <br>
      <div class="accordion-body">
        <table class="table table-bordered" style="background-color: white;">
          <tr>
            <td colspan="3"><b> Income Tax Table 2018-2022 </b></td>
          </tr>
          <tr>
            <td colspan="2" styles=""><b> Amount of Taxable Income </b></td>
            <td rowspan="2"><b> Rate </b></td>
          </tr>
          <tr>
            <td><b>Over</b></td>
            <td><b>But Not Over</b></td>
          </tr>
          <tr>
            <td>-</td>
            <td>250,000</td>
            <td>0%</td>
          </tr>
          <tr>
            <td>250,000</td>
            <td>400,000</td>
            <td>20% of the excess over P250,000</td>
          </tr>
          <tr>
            <td>400,000</td>
            <td>800,000</td>
            <td>P30,000 + 25% of the excess over P400,000</td>
          </tr>
          <tr>
            <td>800,000</td>
            <td>2,000,000</td>
            <td>P130,000 + 30% of the excess over P800,000</td>
          </tr>
          <tr>
            <td>2,000,000</td>
            <td>8,000,000</td>
            <td>P490,000 + 32% of the excess over P2 Million</td>
          </tr>
          <tr>
            <td>8,000,000</td>
            <td></td>
            <td>P2,410,000 + 35% of the excess over P8 Million</td>
          </tr>
        </table>
    </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
  <div class="col-md-4"></div>
  </div>
  </div>
</body>