<?php
// Pre-load all counts in single queries at the top
$counts = [
    'doctor' => $this->db->count_all_results('doctor'),
    'nurse' => $this->db->count_all_results('nurse'),
    'patient' => $this->db->count_all_results('patient'),
    'invoice' => $this->db->count_all_results('invoice'),
    'payment' => $this->db->count_all_results('payment'),
    'message' => $this->db->count_all_results('message'),
    'noticeboard' => $this->db->count_all_results('noticeboard'),
    'blood_donor' => $this->db->count_all_results('blood_donor')
];

// Pre-load recent doctors
$this->db->order_by('doctor_id', 'desc');
$this->db->limit('3');
$doctors = $this->db->get('doctor')->result_array();

// Pre-load recent notices
$this->db->order_by('notice_id', 'desc');
$this->db->limit('3');
$notices = $this->db->get('noticeboard')->result_array();

// Pre-load all calendar events
$calendar_notices = $this->db->get('noticeboard')->result_array();

// Optimized payment chart data
$year = explode('-', $running_year);
$this->db->select('MONTH(FROM_UNIXTIME(timestamp)) as month, SUM(amount) as total_income');
$this->db->from('payment');
$this->db->where('year', $running_year);
$this->db->group_by('MONTH(FROM_UNIXTIME(timestamp))');
$monthly_totals = $this->db->get()->result_array();

$monthly_data = [];
foreach ($monthly_totals as $item) {
    $monthly_data[$item['month']] = $item['total_income'];
}

// Pre-load email recipient data
$admins = $this->db->get('admin')->result_array();
$doctors_list = $this->db->get('doctor')->result_array();
$patients = $this->db->get('patient')->result_array();
$nurses = $this->db->get('nurse')->result_array();
$pharmacists = $this->db->get('pharmacist')->result_array();
$accountants = $this->db->get('accountant')->result_array();
$laboratorists = $this->db->get('laboratorist')->result_array();
?>

<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-danger">
            <div class="r-icon-stats">
                <i class="ti-shopping-cart bg-danger"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['doctor']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/manage_doctor" style="color:white">
                            <?php echo get_phrase('doctors'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-info">
            <div class="r-icon-stats">
                <i class="ti-user bg-info"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['nurse']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/manage_nurse" style="color:white">
                            <?php echo get_phrase('nurses'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-purple">
            <div class="r-icon-stats">
                <i class="ti-user bg-purple"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['patient']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/manage_patient" style="color:white">
                            <?php echo get_phrase('patients'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-success">
            <div class="r-icon-stats">
                <i class="ti-wallet bg-success"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['invoice']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/invoice_add" style="color:white">
                            <?php echo get_phrase('invoice'); ?></a></span>
                </div>
            </div>
        </div>
    </div>


    <!--- ANOTHER INFORMAATION ABOUT DASHBOARD    -->

    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-info">
            <div class="r-icon-stats">
                <i class="ti-user bg-info"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['payment']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/list_invoice" style="color:white">
                            <?php echo get_phrase('payment'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-danger">
            <div class="r-icon-stats">
                <i class="ti-shopping-cart bg-danger"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['message']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/message" style="color:white">
                            <?php echo get_phrase('messages'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-success">
            <div class="r-icon-stats">
                <i class="ti-wallet bg-success"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['noticeboard']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/list_noticeboard" style="color:white">
                            <?php echo get_phrase('events'); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box bg-purple">
            <div class="r-icon-stats">
                <i class="ti-wallet bg-purple"></i>
                <div class="bodystate">
                    <h4><strong style="color:white"><?php echo $counts['blood_donor']; ?></strong></h4>
                    <span class="text-muted"><a href="<?php echo base_url(); ?>admin/view_blood_bank" style="color:white">
                            <?php echo get_phrase('donors'); ?></a></span>
                </div>
            </div>
        </div>
    </div>






    <div class="col-md-12 col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">PAYMENT CHART POWER STATISTICS FOR <?php echo $this->db->get_where('settings', array('type' => 'session'))->row()->description; ?></div>
            <div class="panel-body">
                <div id="flotDashSales1" style="height: 215px;"></div>

                <script>
                    var flotDashSales1Data = [{
                        data: [
                            <?php
                            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                            for ($month = 1; $month <= 12; $month++):
                                $totalincome = isset($monthly_data[$month]) ? $monthly_data[$month] : 0;
                                $m = $months[$month - 1];
                            ?>["<?php echo $m ?>", <?php echo $totalincome ?>],
                            <?php endfor; ?>
                        ],
                        color: "#bc4e9c"
                    }];
                </script>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('recently_added_doctors'); ?></div>
            <div class="panel-body">
                <?php foreach ($doctors as $row): ?>
                    <div class="message-center">
                        <a href="<?php echo base_url(); ?>admin/list_doctor">
                            <div class="user-img"><img src="<?php echo $this->crud_model->get_image_url('doctor', $row['doctor_id']); ?>" alt="user" class="img-circle"><span class="profile-status online pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5> <?php echo $row['name']; ?></h5>
                                <span class="mail-desc"><?php echo $row['gender']; ?>&nbsp;<?php echo $row['phone']; ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-8">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo get_phrase('hospital_event'); ?></div>
            <div class="panel-body">
                <?php foreach ($notices as $row): ?>
                    <div class="message-center">
                        <a href="<?php echo base_url(); ?>admin/list_noticeboard">
                            <div class="user-img"><img src="<?php echo base_url() ?>uploads/logo.png" alt="user" class="img-circle"><span class="profile-status online pull-right"></span> </div>
                            <div class="mail-contnet">
                                <h5> <?php echo $row['notice_title']; ?></h5>
                                <span class="mail-desc"><?php echo $row['notice']; ?>&nbsp;<?php echo date('d', $row['create_timestamp']); ?>&nbsp;<?php echo date('M', $row['create_timestamp']); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Quick Mail -->
    <!-- <div class="col-md-12 col-lg-12">
        <div class="white-box">
            <h3 class="box-title"><?php echo get_phrase('send_quick_mail'); ?></h3>
            <div class="message-center">
                <?php echo form_open(base_url() . 'admin/send_email/send/', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class='form-group'>
                    <select class="form-control select2" name="receiverEmail" required>
                        <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                        <optgroup label="<?php echo get_phrase('admin'); ?>">
                            <?php foreach ($admins as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('doctor'); ?>">
                            <?php foreach ($doctors_list as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('patient'); ?>">
                            <?php foreach ($patients as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('nurse'); ?>">
                            <?php foreach ($nurses as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('pharmacist'); ?>">
                            <?php foreach ($pharmacists as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('accountant'); ?>">
                            <?php foreach ($accountants as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="<?php echo get_phrase('laboratorist'); ?>">
                            <?php foreach ($laboratorists as $row): ?>
                                <option value="<?php echo $row['email']; ?>">
                                    - <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
                <div class='form-group'>
                    <input value="" placeholder="Type subject Here" class="form-control" name="subject" type="text" required>
                </div>
                <div class='form-group'>
                    <textarea class="form-control" id="mymce" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-sm btn-rounded"><i class="fa fa-envelope"></i>&nbsp;<?php echo get_phrase('send_mail'); ?></button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div> -->
</div>

<script>
    $(document).ready(function() {
        // Show loader when page starts loading
        $('body').addClass('loading');

        // Hide loader when everything is loaded
        $(window).on('load', function() {
            setTimeout(function() {
                $('body').removeClass('loading');
            }, 500);
        });

        // Initialize calendar
        var calendar = $('#calendar');
        if (calendar.length) {
            $('#calendar').fullCalendar({
                header: {
                    left: 'title',
                    right: 'today prev,next'
                },
                editable: false,
                firstDay: 1,
                height: 530,
                droppable: false,
                events: [
                    <?php foreach ($calendar_notices as $row): ?> {
                            title: "<?php echo addslashes($row['notice_title']); ?>",
                            start: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>),
                            end: new Date(<?php echo date('Y', $row['create_timestamp']); ?>, <?php echo date('m', $row['create_timestamp']) - 1; ?>, <?php echo date('d', $row['create_timestamp']); ?>)
                        },
                    <?php endforeach; ?>
                ]
            });
        }

        // Initialize Flot chart
        if (typeof flotDashSales1Data !== 'undefined') {
            $.plot($("#flotDashSales1"), flotDashSales1Data, {
                xaxis: {
                    mode: "categories",
                    tickLength: 0
                },
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.0
                            }, {
                                opacity: 0.0
                            }]
                        }
                    },
                    points: {
                        show: true,
                        radius: 3,
                        lineWidth: 1
                    },
                    grow: {
                        active: true,
                        steps: 50
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#f0f0f0",
                    borderWidth: 1,
                    borderColor: "#f0f0f0"
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%s: %y",
                    defaultTheme: false
                }
            });
        }
    });
</script>

<style>
    body.loading::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: 9998;
    }

    body.loading::after {
        content: "Loading...";
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #333;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 9999;
    }
</style>