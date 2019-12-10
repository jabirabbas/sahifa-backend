(function ($) {
    "use strict";

    var StepMaker = function (container, options) {

        options = options || {};
        container = $(container);

        var defaults = {
            steps: [],
            currentStep: 1
        };

        var calcHorizontalBarWidth = function (width, steps) {
            return width / steps;
        };

        var calcPosition = function (width) {
            return width / 2;
        };

        var buildBarCss = function (width, horizontalWidth, leftPostion) {
            return {
                'width': (width - horizontalWidth) + 'px',
                'left': leftPostion + 'px',
            };
        };

        var steps = options.steps || defaults.steps,
            currentStep = options.currentStep || defaults.currentStep,
            containerWidth = container.width(),
            horizontalBarWidth,
            leftPostionBar,
            html = {
                stepContainer: $('<div class="lifecycle-wrap">'),
                steps: $('<ul class="lifecycle-step">'),
                bar: $('<hr>'),
            };

        this.build = function () {
            container = $(container);

            var stepWidth = (containerWidth-20) / steps.length;
            
            if (currentStep > steps.length || currentStep <= 0)
                currentStep = 1;

            $.each(steps, function (index, step) {
                // Non zero-based
                index += 1;

                var stepItem = $('<li class="step">'),
                    stepNumberLabel = $('<span class="step'+index+'">'),
                    span = $('<span>').html('&nbsp;'),
                    stepNameLabel = $('<label>').html(step);

                if (currentStep >= index)
                    stepNumberLabel.addClass("step-done");

                stepItem.css({
                    'width': stepWidth + 'px',
                    'max-width': stepWidth + 'px',
                });

                stepNumberLabel.html(span);

                stepItem.append(stepNameLabel);
                stepItem.append(stepNumberLabel);
                html.steps.append(stepItem);
            });

            horizontalBarWidth = calcHorizontalBarWidth(containerWidth, steps.length);
            leftPostionBar = calcPosition(horizontalBarWidth);

            html.bar.css(buildBarCss(containerWidth, horizontalBarWidth, leftPostionBar));
            //html.stepContainer.prepend(html.bar);
            html.stepContainer.append(html.steps);

            container.empty();
            container.html(html.stepContainer);
        };

    };

    $.fn.stepMaker = function (options) {
        var step = new StepMaker(this, options);
        step.build();
    };

})(jQuery);
