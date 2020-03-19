class ModalHead{
     constructor(MaxIdex){
          this.MaxIdex = MaxIdex;
          this.actualIndex = 1;
          this.ProgressLineIncrement = 100 / this.MaxIdex;
          this.ProgressLineIncrement = this.ProgressLineIncrement.toFixed(2);
          this.ActualProgressLine = this.ProgressLineIncrement / 2;
          this.ActualProgressLine = this.ActualProgressLine.toFixed(2);
     }

     getActualIndex() { return this.actualIndex; }
     setActualIndex(index) { this.actualIndex = index; }
     getActualProgressLine() { return this.ActualProgressLine; }
     incActualProgressLine() {
          this.ActualProgressLine = parseFloat(this.ActualProgressLine) + parseFloat(this.ProgressLineIncrement);
          this.actualIndex++;
     }
     decActualProgressLine() {
          this.ActualProgressLine = parseFloat(this.ActualProgressLine) - parseFloat(this.ProgressLineIncrement);
          this.actualIndex--;
     }
}

$(function() {
     modal = new ModalHead($(".fieldSet").children("fieldset").length);
     $("fieldset").hide();
     $(".fieldSet fieldset:nth-child(" + modal.getActualIndex() + ")").show();
     showActualFieldset();
     $('.btnNext').click(function(e) {
          var parentFieldset = $(this).parents('fieldset');
          var nextStep = true;
          var currentActiveStep = $(this).parents('.modalStyle').find('.modalStep.active');

          parentFieldset.find('input[type="text"], textarea').filter('[required]').each(function() {
               if($(this).val() == "") {
                    $(this).addClass('border border-danger');
                    nextStep = false;
               }
               else
                    $(this).removeClass('border border-danger');
          });

          if(nextStep) {
               parentFieldset.fadeOut(400, function() {
                    currentActiveStep.removeClass('active').addClass('activated').next().addClass('active');
                    modal.incActualProgressLine();
                    showActualFieldset();
                    $(this).next().fadeIn(400);
               });
          }
     });
     $('.btnPrevious').click(function(e) {
         	var currentActiveStep = $(this).parents('.modalStyle').find('.modalStep.active');

         	$(this).parents('fieldset').fadeOut(400, function() {
         		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active');
               modal.decActualProgressLine();
               showActualFieldset();
               $(this).prev().fadeIn(400);
         	});
     });
});

function showActualFieldset() {
     $(".modalProgressLine").css({ "width": modal.getActualProgressLine() + "%" });
}
