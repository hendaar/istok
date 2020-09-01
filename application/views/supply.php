<div class="container-fluid" >
<div class="row">
  <!------ Start Menu Left ---------->
  <div class="col-md-3" style="clear: both; padding: 0; margin: 0;">
	<nav class="leftmenu">
	  <ul class="navbar-nav">
		<li class="nav-item">
		  <a class="nav-link" href="<?php echo base_url(); ?>supply"><img src="<?php echo base_url(); ?>assets/images/menu-sup.png"><div class="menu-satu">Supply Chain Performance</div></a>
		</li>
	  </ul>
	</nav>
	
<div class="leftmenufilter card shadow">
	<div class="leftmenufilter"><center>
		<?php echo form_open("supply", array('method'=>'post')); ?>
		<table cellpadding="2">
		  <tr>
			<td colspan="3" align="center"><h3>Snapshot</h3></td>
		  </tr>
		  <tr>
			<td id="p_year_text">Year</td>
			<td><input type="number" name="p_year" id="p_year" class="form-control" placeholder="Year" value="<?php echo $tahun; ?>"></td>
		  </tr>
		  <tr>
			<td id="p_period_text">Period</td>
			<td>
				<select name="p_period" id="p_period" class="form-control">
				  <option value="monthly">Monthly</option>
				  <option value="quarterly">Quarterly</option>
				  <option value="yearly">Yearly</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td id="p_period_sub_text">Sub Period</td>
			<td>
				<input type="date" name="p_period_sub_date" id="p_period_sub_date" class="form-control" placeholder="Daily" value="<?php echo $tanggal; ?>" required>

				<select name="p_period_sub_month" id="p_period_sub_month" class="form-control">
				  <option value="1">January</option>
				  <option value="2">February</option>
				  <option value="3">March</option>
				  <option value="4">April</option>
				  <option value="5">May</option>
				  <option value="6">June</option>
				  <option value="7">July</option>
				  <option value="8">August</option>
				  <option value="9">September</option>
				  <option value="10">October</option>
				  <option value="11">November</option>
				  <option value="12">December</option>
				</select>

				<select name="p_period_sub_quarter" id="p_period_sub_quarter" class="form-control">
				  <option value="q1">Q1</option>
				  <option value="q2">Q2</option>
				  <option value="q3">Q3</option>
				  <option value="q4">Q4</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td></td>
			<td>			
				<button class="btn btn-primary btn-icon-split" type="submit" id="cari">
					<span class="icon text-white-50"><i class="fas fa-check"></i></span>
					<span class="text">Search</span></button>
			</td>
		  </tr>
		</table>
			<?php echo form_close(); ?>
		<?php echo $filter_result; ?>
	</div>
	<div class="leftmenufilter"><canvas id="myChart" height="300"></canvas></div>	
	<div class="leftmenufilter"><canvas id="myChart2" height="300"></canvas></div>
</div>
 </div>
  <!------ End Menu Left ---------->

  <!------ Start content ---------->
  <div class="col-md-9">

<div class="col-md-12">
	<div class="row">
		<div class="col-md-6 card">
			<div class="shadow"><canvas id="myChart3" height="200"></canvas></div></br>
			<div class="shadow"><canvas id="myChart4" height="200"></canvas></div></br>
			<div class="shadow"><canvas id="myChart5" height="200"></canvas></div></br>
		</div>
		
		<div class="col-md-6 card">
			<div class="shadow"><canvas id="myChart6" height="200"></canvas></div></br>
			<div class="shadow"><canvas id="myChart7" height="200"></canvas></div></br>
			<div class="shadow"><canvas id="myChart8" height="200"></canvas></div></br>
		</div>
</div>

<script>

$(document).ready(function(){
		var queryString = new URL('<?php echo current_url().'?'.$qeury_url; ?>');
		var urlParams = new URLSearchParams(queryString.search);
		var status = '<?php echo $periode; ?>';
		var year = urlParams.get('p_year');
		var date = urlParams.get('p_period_sub_date');
		var month = urlParams.get('p_period_sub_month');
		var quarter = urlParams.get('p_period_sub_quarter');
		
		if (status=="daily") {
			$("#p_period").val(status);
			$("#p_period_sub_date_text").show();
			$("#p_period_sub_date").show();
			$("#p_period_sub_date").val(date);
			$("#p_year_text").hide();
			$("#p_year").hide();
			$("#p_period_text").show();
			$("#p_period_sub_text").show();	
			$("#p_period_sub_month").hide();
			$("#p_period_sub_quarter").hide();
		};
		
		if (status=="monthly") {
			$("#p_period").val(status);
			$("#p_period_sub_date_text").hide();
			$("#p_period_sub_date").hide();
			$("#p_year_text").show();
			$("#p_year").show();
			$("#p_year").val(year);
			$("#p_period_text").show();
			$("#p_period_sub_text").show();	
			$("#p_period_sub_month").show();
			$("#p_period_sub_month").val(month);
			$("#p_period_sub_quarter").hide();
		};
		
		if (status=="quarterly") {
			$("#p_period").val(status);
			$("#p_period_sub_date_text").hide();
			$("#p_period_sub_date").hide();
			$("#p_year_text").show();
			$("#p_year").show();
			$("#p_year").val(year);
			$("#p_period_text").show();
			$("#p_period_sub_text").show();	
			$("#p_period_sub_month").hide();
			$("#p_period_sub_quarter").show();
			$("#p_period_sub_quarter").val(quarter);
		};

		if (status=="yearly") {
			$("#p_period").val(status);
			$("#p_period_sub_date_text").hide();
			$("#p_period_sub_date").hide();
			$("#p_year_text").show();
			$("#p_year").show();
			$("#p_year").val(year);
			$("#p_period_text").show();
			$("#p_period_sub_text").hide();	
			$("#p_period_sub_month").hide();
			$("#p_period_sub_quarter").hide();
		};	

    $("#p_period").change(function(){		
			var status = this.value;

			if (status=="daily") {
				$("#p_period_sub_date_text").show();
				$("#p_period_sub_date").show();
				$("#p_year_text").hide();
				$("#p_year").hide();
				$("#p_period_text").show();
				$("#p_period_sub_text").show();	
				$("#p_period_sub_month").hide();
				$("#p_period_sub_quarter").hide();
			};
			
			if (status=="monthly") {
				$("#p_period_sub_date_text").hide();
				$("#p_period_sub_date").hide();
				$("#p_year_text").show();
				$("#p_year").show();
				$("#p_period_text").show();
				$("#p_period_sub_text").show();	
				$("#p_period_sub_month").show();
				$("#p_period_sub_quarter").hide();
			};
			
			if (status=="quarterly") {
				$("#p_period_sub_date_text").hide();
				$("#p_period_sub_date").hide();
				$("#p_year_text").show();
				$("#p_year").show();
				$("#p_period_text").show();
				$("#p_period_sub_text").show();	
				$("#p_period_sub_month").hide();
				$("#p_period_sub_quarter").show();
			};

			if (status=="yearly") {
				$("#p_period_sub_date_text").hide();
				$("#p_period_sub_date").hide();
				$("#p_year_text").show();
				$("#p_year").show();
				$("#p_period_text").show();
				$("#p_period_sub_text").hide();	
				$("#p_period_sub_month").hide();
				$("#p_period_sub_quarter").hide();
			};

		});
		
});
</script>

<script>
const api_url_vendor_performance = "<?php echo base_url().'chart/vendor_performance?'.$qeury_url; ?>";

var departments_vendor_performance = [];

async function getData_vendor_performance() {
	const response = await fetch(api_url_vendor_performance);
	const data = await response.json();
	const data_label = data.vendor;
	for (var department in data.chart) {
		var departmentObject = prepareDepartmentDetails_vendor_performance(data.chart[department].movement_reason_name, data.chart[department].total, data.chart[department].color);
		departments_vendor_performance.push(departmentObject);
	}
	return {data_label, departments_vendor_performance};	
}


 async function setup() {
	const ctx = document.getElementById('myChart').getContext('2d');
	const globalTemps = await getData_vendor_performance();
	
	var chartData = {
			labels: globalTemps.data_label.split('|'),
			datasets : globalTemps.departments_vendor_performance
	};
console.log(chartData);
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
			title: {
				display: true,
				text: 'Vendor CSI Performance'
			},
			responsive: true,
			legend: {
				display: true,
				position: 'bottom', // place legend on the right side of chart
				align: 'start',
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false // this also..
				}]
			}
		}
	});
}
	
function prepareDepartmentDetails_vendor_performance(movement_reason_name, total, color){
    return {
        label : movement_reason_name,
        data : total.split(','),
        backgroundColor: color,
        borderColor: 'rgb(255, 99, 132)'
    }
}
 setup();
</script>

<script>
const api_url_transporter_performance = "<?php echo base_url().'chart/transporter_performance?'.$qeury_url; ?>";

var departments_transporter_performance = [];

async function getData_transporter_performance() {
	const response = await fetch(api_url_transporter_performance);
	const data = await response.json();
	const data_label = data.transporter;
	for (var department in data.chart) {
		var departmentObject = prepareDepartmentDetails_vendor_performance(data.chart[department].movement_reason_name, data.chart[department].total, data.chart[department].color);
		departments_transporter_performance.push(departmentObject);
	}
	return {data_label, departments_transporter_performance};	
}


 async function setup_chart2() {
	const ctx = document.getElementById('myChart2').getContext('2d');
	const globalTemps = await getData_transporter_performance();
	
	var chartData = {
			labels: globalTemps.data_label.split('|'),
			datasets : globalTemps.departments_transporter_performance
	};
console.log(chartData);
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
			title: {
				display: true,
				text: 'transporter CSI Performance'
			},
			responsive: true,
			legend: {
				display: true,
				position: 'bottom', // place legend on the right side of chart
				align: 'start',
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false // this also..
				}]
			}
		}
	});
}

setup_chart2();
</script>

<script>
const api_url_invenory_1 = "<?php echo base_url().'chart/inventory_performance/1?'.$qeury_url; ?>";

var departments_inventory_1 = [];

async function getData_inventory_1() {
	const response = await fetch(api_url_invenory_1);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_inventory_1.push(departmentObject);
	}
	
	for (var department_fill in data.chart_fill) {
		var departmentObject_fill = prepare_inventory_data_fill(data.chart_fill[department_fill].label, data.chart_fill[department_fill].datas, data.chart_fill[department_fill].color, data.chart_fill[department_fill].fill);
		departments_inventory_1.push(departmentObject_fill);
	}
	
	return {data_label, departments_inventory_1};	
}


 async function setup_lati() {
	const ctx = document.getElementById('myChart3').getContext('2d');
	const globalTemps = await getData_inventory_1();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_inventory_1
	};
	const myChart = new Chart(ctx, {
		type: 'line',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Inventory Performance Lati Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

function prepare_inventory_data(label, datas, color){
	return {
			label : label,
			data : datas.split(','),
			backgroundColor: color,
			fill: false,
			borderColor: color
	}
}

function prepare_inventory_data_fill(label, datas, color, fill){
	return {
			label : label,
			data : datas.split(','),
			backgroundColor: color,
			fill: fill,
			borderColor: color,
			pointRadius: 0,
			steppedLine: true
	}
}
setup_lati();
</script>

<script>
const api_url_invenory_2 = "<?php echo base_url().'chart/inventory_performance/2?'.$qeury_url; ?>";

var departments_inventory_2 = [];

async function getData_inventory_2() {
	const response = await fetch(api_url_invenory_2);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_inventory_2.push(departmentObject);
	}
	
	for (var department_fill in data.chart_fill) {
		var departmentObject_fill = prepare_inventory_data_fill(data.chart_fill[department_fill].label, data.chart_fill[department_fill].datas, data.chart_fill[department_fill].color, data.chart_fill[department_fill].fill);
		departments_inventory_2.push(departmentObject_fill);
	}
	
	return {data_label, departments_inventory_2};	
}


 async function setup_suaran() {
	const ctx = document.getElementById('myChart4').getContext('2d');
	const globalTemps = await getData_inventory_2();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_inventory_2
	};
console.log(globalTemps);
	const myChart = new Chart(ctx, {
		type: 'line',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Inventory Performance Suaran Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

setup_suaran();
</script>

<script>

const api_url_invenory_3 = "<?php echo base_url().'chart/inventory_performance/3?'.$qeury_url; ?>";

var departments_inventory_3 = [];

async function getData_inventory_3() {
	const response = await fetch(api_url_invenory_3);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_inventory_3.push(departmentObject);
	}
	
	for (var department_fill in data.chart_fill) {
		var departmentObject_fill = prepare_inventory_data_fill(data.chart_fill[department_fill].label, data.chart_fill[department_fill].datas, data.chart_fill[department_fill].color, data.chart_fill[department_fill].fill);
		departments_inventory_3.push(departmentObject_fill);
	}
	
	return {data_label, departments_inventory_3};	
}


 async function setup_sambarata() {
	const ctx = document.getElementById('myChart5').getContext('2d');
	const globalTemps = await getData_inventory_3();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_inventory_3
	};
console.log(globalTemps);
	const myChart = new Chart(ctx, {
		type: 'line',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Inventory Performance Sambarata Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

setup_sambarata();
</script>

<script>

const api_url_available_1 = "<?php echo base_url().'chart/availability_performance/1?'.$qeury_url; ?>";

var departments_available_1 = [];

async function getData_available_1() {
	const response = await fetch(api_url_available_1);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_available_1.push(departmentObject);
	}
	
	return {data_label, departments_available_1};	
}


 async function setup_lati_available() {
	const ctx = document.getElementById('myChart6').getContext('2d');
	const globalTemps = await getData_available_1();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_available_1
	};
console.log(globalTemps);
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Availability Performance Lati Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

setup_lati_available();
</script>

<script>

const api_url_available_2 = "<?php echo base_url().'chart/availability_performance/2?'.$qeury_url; ?>";

var departments_available_2 = [];

async function getData_available_2() {
	const response = await fetch(api_url_available_2);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_available_2.push(departmentObject);
	}
	
	return {data_label, departments_available_2};	
}


 async function setup_suaran_available() {
	const ctx = document.getElementById('myChart7').getContext('2d');
	const globalTemps = await getData_available_2();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_available_2
	};
console.log(globalTemps);
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Availability Performance Suaran Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

setup_suaran_available();
</script>

<script>

const api_url_available_3 = "<?php echo base_url().'chart/availability_performance/3?'.$qeury_url; ?>";

var departments_available_3 = [];

async function getData_available_3() {
	const response = await fetch(api_url_available_3);
	const data = await response.json();
	const data_label = data.labels;
	
	for (var department in data.chart) {
		var departmentObject = prepare_inventory_data(data.chart[department].label, data.chart[department].datas, data.chart[department].color);
		departments_available_3.push(departmentObject);
	}
	
	return {data_label, departments_available_3};	
}


 async function setup_sambarata_available() {
	const ctx = document.getElementById('myChart8').getContext('2d');
	const globalTemps = await getData_available_3();
	
	var chartData = {
			labels: globalTemps.data_label.split(','),
			datasets : globalTemps.departments_available_3
	};
console.log(globalTemps);
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
				title: {
					display: true,
					text: 'Availability Performance Sambarata Storage'
				},
			responsive: true,
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = tooltipItem.yLabel;
						value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return data.datasets[tooltipItem.datasetIndex].label+' : '+value;
					}
			  } // end callbacks:
			},
			scales: {
				xAxes: [{
					stacked: false // this should be set to make the bars stacked
				}],
				yAxes: [{
					stacked: false, // this also..
					ticks: {
									// Include a dollar sign in the ticks
									callback: function(value, index, values) {
											return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
									}
                }
				}]
			}
		}
	});
}

setup_sambarata_available();
</script>
