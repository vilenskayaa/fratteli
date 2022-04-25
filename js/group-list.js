$(document).ready(function(){
  $('data-remove').hide(0)

  $("[data-popup]").click(() => {
    $('.overlay').fadeIn(300)
    $('#popup-1').fadeIn(300)
  })

  $(".overlay").click(() => {
    $('.overlay').fadeOut(300)
    $('#popup-1').fadeOut(300)
  })

  $("#edit").click(() => {
    editShow()
  })

  $("#editHide").click(() => {
    editHide() 
  })

  $("div[data-edit]").click(function() {
    toggleEditRow($(this))
  });
});

const toggleEditRow = (element) => {
  const id = element.attr("data-edit")
  element.toggleClass('active')
  $(`[data-remove=${id}]`).toggleClass('show')
  if ($(`[data-mark=${id}]`).attr('disabled')) {
    $(`[data-mark=${id}]`).removeAttr('disabled')
  } else {
    $(`[data-mark=${id}]`).attr('disabled', '')
  } 
}

const removeEditRow = (element) => {
  const id = element.attr("data-edit")
  element.removeClass('active')
  $(`[data-remove=${id}]`).removeClass('show')
  $(`[data-mark=${id}]`).attr('disabled', '')
}

const editShow = () => {
  $('[data-editShow]').show(300)
  $('.head__nav-default').hide(0)
  $('.head__nav-sub').toggleClass('show')
}

const editHide = () => {
  $('.head__nav-default').show(300)
  $('[data-editShow]').hide(0)
  $('.head__nav-sub').toggleClass('show')
  $("div[data-edit]").each(function () {
    removeEditRow($(this))
  })
}
