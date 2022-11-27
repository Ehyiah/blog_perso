import { Controller } from '@hotwired/stimulus';
import Quill from "quill/dist/quill";

type ExtraOptions = {
    theme: string;
    debug: string|null;
    height: string|null;
}

export default class extends Controller {
    readonly inputTarget: HTMLDivElement;
    readonly toolbarOptionsValue: HTMLDivElement;
    readonly extraOptionsValue: ExtraOptions;
    readonly editorContainerTarget: HTMLDivElement;

    static targets = ['input', 'editorContainer'];
    static values = {
        toolbarOptions: {
            type: Array,
            default: [],
        },
        extraOptions: {
            type: Object,
            default: {},
        }
    }

    connect() {
        const test = this.toolbarOptionsValue;
        const toolbarOptions = [
            // ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            // ['blockquote', 'code-block'],

            // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            // [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            // [{ 'indent': '-1'}, { 'indent': '+1' }],
            // [{ 'direction': 'rtl' }],                         // text direction

            // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            // [{ 'header': [1, 2, 3, 4, 5, 6, false] }, { 'color': ['green', 'blue', 'red'] }],
            // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            // [{ 'color': ['green', 'blue', 'red'] }],
            //
            // [{ 'color': ['green', 'blue', 'red'] }, { 'background': [] }],          // dropdown with defaults from theme
            // [{ 'font': [] }],
            // [{ 'align': [] }],
            //
            // ['link', 'image'],
            // ['clean']                                         // remove formatting button
        ];

        // console.log(test)
        // console.log(toolbarOptions)

        const options = {
            debug: this.extraOptionsValue.debug,
            modules: {
                toolbar: test,
            },
            placeholder: 'Go and test Quill editor',
            theme: this.extraOptionsValue.theme,
        };

        const heightDefined = this.extraOptionsValue.height;
        if (null !== heightDefined) {
            this.editorContainerTarget.style.height = this.extraOptionsValue.height
        }

        const quill = new Quill('.quill-editor', options);
        quill.on('text-change', (delta, deltaResult, source) => {
            this.inputTarget.innerHTML = quill.root.innerHTML;
        })
    }
}
