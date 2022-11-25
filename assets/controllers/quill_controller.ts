import { Controller } from '@hotwired/stimulus';
import Quill from "quill/dist/quill";

export default class extends Controller {
    readonly babarTarget: HTMLDivElement;
    readonly toolbarOptionsValue: HTMLDivElement;

    static targets = ['babar'];
    static values = {
        toolbarOptions: {
            // type: String,
            // default: '',
            // type: Object,
            // default: {}
            type: Array,
            default: ['bold', 'italic', ['underline']]
        },
    }

    // readonly inputTarget: HTMLInputElement;
    // readonly placeholderTarget: HTMLDivElement;
    // readonly previewClearButtonTarget: HTMLButtonElement;

    connect() {
        console.log(this.toolbarOptionsValue)
        // console.log(this.babarTarget);
        // console.log(this.babarTarget.getAttribute('data-quill-target'));
        // console.log(this.babarTarget.getAttributeNode('data-quill-target'));
        // console.log(this.babarTarget.textContent);
        console.log('coucou from quill controller');

        const test = this.toolbarOptionsValue;
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        console.log(test)
        console.log(toolbarOptions)

        const options = {
            // debug: 'info',
            // modules: {
            //     toolbar: {
            //         container: '#toolbar',
            //         options: toolbarOptions
            //     }
            // },
            // modules: {
            //     toolbar: '#toolbar',
            // },
            modules: {
                toolbar: test,
            },
            placeholder: 'Go and test Quill editor',
            theme: 'snow'
        };

        const editor = new Quill('.quill', options);  // First matching element will be used
    }
}
