$(document).ready(function(){
  notifications();
  
  function notifications() {
    $.ajax({
        url: "assets/includes/notifications.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success:function(data) {
          $('.total_inbox_count').html(data.total_num_of_inbox);
          $('.sidebar_total_inbox_count').html(data.total_num_of_inbox_sidebar);
          $('.new_total_inbox_count').html(data.new_total_inbox);
          $('.sm_new_total_inbox_count').html(data.sm_new_total_inbox);
          $('.total_starred_count').html(data.total_num_of_starred);
          $('.sidebar_total_starred_count').html(data.total_num_of_starred_sidebar);
          $('.total_important_count').html(data.total_num_of_important);
          $('.sidebar_total_important_count').html(data.total_num_of_important_sidebar);
          $('.total_sent_count').html(data.total_num_of_sent);
          $('.sidebar_total_sent_count').html(data.total_num_of_sent_sidebar);
          $('.total_all_mails_count').html(data.total_num_of_all_mails);
          $('.sidebar_total_all_mails_count').html(data.total_num_of_all_mails_sidebar);
          $('.total_spam_count').html(data.total_num_of_spam);
          $('.sidebar_total_spam_count').html(data.total_num_of_spam_sidebar);
          $('.total_bin_count').html(data.total_num_of_bin);
          $('.sidebar_total_bin_count').html(data.total_num_of_bin_sidebar);
        }
      });
  }

  setInterval(function(){ 
    notifications();
  }, 1000);
});