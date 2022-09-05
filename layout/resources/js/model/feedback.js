// Feedback Model
"use strict";

function Feedback(columns, sideColumns, feedbacks) {
    this.columns = columns;
    this.sideColumns = sideColumns;
    this.feedbacks = feedbacks;

    // templates
    this.template = `<!-- Feedback Template Right -->
        <div class="w-100 text-start feedback p-3 pb-2 mb-3 {{ rate }}">
            <h4 class="text-light mb-0">{{ username }}</h4 class="text-light">
            <p class="text-success rate"><i class="fa-solid fa-star text-light me-1"></i>{{ rate }}</p>
            <p class="text-light"><strong>"</strong>
                {{ description }}
            <strong>"</strong></p>
        </div>
    `;

    this.feedbackHeader = `
        <h4 class="text-light open-sans">Feedback</h4>
        <p class="roboto mb-4">Information about reactions to a product, a person's performance of a task, etc. which is used as a basis for improvement.</p>
    `;

    this.feedback = `<!-- Feedback Template Left -->
        <div class="bg-feedback text-light w-75 p-3 pb-1 mb-3">
            <h5 class="d-inline me-2 roboto">{{ username }}</h5><span class="badge text-bg-light text-light {{ rate }}">{{ rate }}</span>
            <p class="roboto w-100 description mt-3">{{ description }}</p>
        </div>
    `;

    this.footer = `<div class="mt-3 text-primary">----------</div>`;

    // encapsulation
    this.setDetails = () => {
        let size = this.columns.length;
        let feedbackText = '';

        this.feedbacks.forEach((value, index) => {
            let column = this.columns.eq(index % size);

            feedbackText += this.feedback
                .replace('{{ username }}', value.username)
                .replace('{{ description }}', value.description)
                .replaceAll('{{ rate }}', value.rate);

            column.html(column.html() + this.template
                .replace('{{ username }}', value.username)
                .replace('{{ description }}', value.description)
                .replaceAll('{{ rate }}', value.rate));
        });

        this.sideColumns.html(this.feedbackHeader + feedbackText + this.footer);

        return this;
    };
    
}