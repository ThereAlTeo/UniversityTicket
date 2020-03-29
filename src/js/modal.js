class ModalHead{
     constructor(MaxIdex){
          this.MaxIdex = MaxIdex;
          this.actualIndex = 1;
          this.ProgressLineIncrement = 100 / this.MaxIdex;
          this.ProgressLineIncrement = this.ProgressLineIncrement.toFixed(2);
          this.ActualProgressLine = this.ProgressLineIncrement / 2;
          this.ActualProgressLine = this.ActualProgressLine.toFixed(2);
          this.goNext = false;
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
     setGoToNext(Value) { this.goNext = Value; }
     canGoToNext() { return this.goNext; }
}

$(function() {
     modal = new ModalHead($(".fieldSet").children("fieldset").length);
     $("fieldset").hide();
     $(".fieldSet fieldset:nth-child(" + modal.getActualIndex() + ")").show();
     showActualFieldset();

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

function nextFieldset(element) {
     if(modal.canGoToNext()){
          $(element).parents('fieldset').fadeOut(400, function() {
               $(element).parents('.modalStyle').find('.modalStep.active').removeClass('active').addClass('activated').next().addClass('active');
               modal.incActualProgressLine();
               showActualFieldset();
               $(this).next().fadeIn(400);
          });
     }
}

function consumerCheckElement(Value, Element, MaxOf = 0) {
     $(Element).removeClass('border border-danger border-warning');

     if(Value == "") {
          $(Element).addClass('border border-danger');
          modal.setGoToNext(false);
     }else if (MaxOf != 0 && Value > MaxOf) {
          $(Element).addClass('border border-warning');
          modal.setGoToNext(false);
     }          
}

function showActualFieldset() {
     $(".modalProgressLine").css({ "width": modal.getActualProgressLine() + "%" });
}
