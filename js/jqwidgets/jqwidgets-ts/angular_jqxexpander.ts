/*
jQWidgets v5.3.2 (2017-Sep)
Copyright (c) 2011-2017 jQWidgets.
License: http://jqwidgets.com/license/
*/
/// <reference path="jqwidgets.d.ts" />
import { Component, Input, Output, EventEmitter, ElementRef, forwardRef, OnChanges, SimpleChanges, ChangeDetectionStrategy } from '@angular/core';
declare let JQXLite: any;

@Component({
    selector: 'jqxExpander',
    template: '<div><ng-content></ng-content></div>'
})

export class jqxExpanderComponent implements OnChanges
{
   @Input('animationType') attrAnimationType: any;
   @Input('arrowPosition') attrArrowPosition: any;
   @Input('collapseAnimationDuration') attrCollapseAnimationDuration: any;
   @Input('disabled') attrDisabled: any;
   @Input('expanded') attrExpanded: any;
   @Input('expandAnimationDuration') attrExpandAnimationDuration: any;
   @Input('headerPosition') attrHeaderPosition: any;
   @Input('initContent') attrInitContent: any;
   @Input('rtl') attrRtl: any;
   @Input('showArrow') attrShowArrow: any;
   @Input('theme') attrTheme: any;
   @Input('toggleMode') attrToggleMode: any;
   @Input('width') attrWidth: any;
   @Input('height') attrHeight: any;

   @Input('auto-create') autoCreate: boolean = true;

   properties: string[] = ['animationType','arrowPosition','collapseAnimationDuration','disabled','expanded','expandAnimationDuration','height','headerPosition','initContent','rtl','showArrow','theme','toggleMode','width'];
   host: any;
   elementRef: ElementRef;
   widgetObject:  jqwidgets.jqxExpander;

   constructor(containerElement: ElementRef) {
      this.elementRef = containerElement;
   }

   ngOnInit() {
      if (this.autoCreate) {
         this.createComponent(); 
      }
   }; 

   ngOnChanges(changes: SimpleChanges) {
      if (this.host) {
         for (let i = 0; i < this.properties.length; i++) {
            let attrName = 'attr' + this.properties[i].substring(0, 1).toUpperCase() + this.properties[i].substring(1);
            let areEqual: boolean;

            if (this[attrName] !== undefined) {
               if (typeof this[attrName] === 'object') {
                  if (this[attrName] instanceof Array) {
                     areEqual = this.arraysEqual(this[attrName], this.host.jqxExpander(this.properties[i]));
                  }
                  if (areEqual) {
                     return false;
                  }

                  this.host.jqxExpander(this.properties[i], this[attrName]);
                  continue;
               }

               if (this[attrName] !== this.host.jqxExpander(this.properties[i])) {
                  this.host.jqxExpander(this.properties[i], this[attrName]); 
               }
            }
         }
      }
   }

   arraysEqual(attrValue: any, hostValue: any): boolean {
      if (attrValue.length != hostValue.length) {
         return false;
      }
      for (let i = 0; i < attrValue.length; i++) {
         if (attrValue[i] !== hostValue[i]) {
            return false;
         }
      }
      return true;
   }

   manageAttributes(): any {
      let options = {};
      for (let i = 0; i < this.properties.length; i++) {
         let attrName = 'attr' + this.properties[i].substring(0, 1).toUpperCase() + this.properties[i].substring(1);
         if (this[attrName] !== undefined) {
            options[this.properties[i]] = this[attrName];
         }
      }
      return options;
   }

   moveClasses(parentEl: HTMLElement, childEl: HTMLElement): void {
      let classes: any = parentEl.classList;
      childEl.classList.add(...classes);
      parentEl.className = '';
   }

   moveStyles(parentEl: HTMLElement, childEl: HTMLElement): void {
      let style = parentEl.style.cssText;
      childEl.style.cssText = style
      parentEl.style.cssText = '';
   }

   createComponent(options?: any): void {
      if (options) {
         JQXLite.extend(options, this.manageAttributes());
      }
      else {
        options = this.manageAttributes();
      }
      this.host = JQXLite(this.elementRef.nativeElement.firstChild);

      this.moveClasses(this.elementRef.nativeElement, this.host[0]);
      this.moveStyles(this.elementRef.nativeElement, this.host[0]);

      this.__wireEvents__();
      this.widgetObject = jqwidgets.createInstance(this.host, 'jqxExpander', options);

      this.__updateRect__();
   }

   createWidget(options?: any): void {
        this.createComponent(options);
   }

   __updateRect__() : void {
      this.host.css({ width: this.attrWidth, height: this.attrHeight });
   }

   setOptions(options: any) : void {
      this.host.jqxExpander('setOptions', options);
   }

   // jqxExpanderComponent properties
   animationType(arg?: string) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('animationType', arg);
      } else {
          return this.host.jqxExpander('animationType');
      }
   }

   arrowPosition(arg?: string) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('arrowPosition', arg);
      } else {
          return this.host.jqxExpander('arrowPosition');
      }
   }

   collapseAnimationDuration(arg?: number) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('collapseAnimationDuration', arg);
      } else {
          return this.host.jqxExpander('collapseAnimationDuration');
      }
   }

   disabled(arg?: boolean) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('disabled', arg);
      } else {
          return this.host.jqxExpander('disabled');
      }
   }

   expanded(arg?: boolean) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('expanded', arg);
      } else {
          return this.host.jqxExpander('expanded');
      }
   }

   expandAnimationDuration(arg?: number) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('expandAnimationDuration', arg);
      } else {
          return this.host.jqxExpander('expandAnimationDuration');
      }
   }

   height(arg?: String | Number) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('height', arg);
      } else {
          return this.host.jqxExpander('height');
      }
   }

   headerPosition(arg?: string) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('headerPosition', arg);
      } else {
          return this.host.jqxExpander('headerPosition');
      }
   }

   initContent(arg?: () => void) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('initContent', arg);
      } else {
          return this.host.jqxExpander('initContent');
      }
   }

   rtl(arg?: boolean) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('rtl', arg);
      } else {
          return this.host.jqxExpander('rtl');
      }
   }

   showArrow(arg?: boolean) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('showArrow', arg);
      } else {
          return this.host.jqxExpander('showArrow');
      }
   }

   theme(arg?: string) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('theme', arg);
      } else {
          return this.host.jqxExpander('theme');
      }
   }

   toggleMode(arg?: string) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('toggleMode', arg);
      } else {
          return this.host.jqxExpander('toggleMode');
      }
   }

   width(arg?: String | Number) : any {
      if (arg !== undefined) {
          this.host.jqxExpander('width', arg);
      } else {
          return this.host.jqxExpander('width');
      }
   }


   // jqxExpanderComponent functions
   collapse(): void {
      this.host.jqxExpander('collapse');
   }

   disable(): void {
      this.host.jqxExpander('disable');
   }

   destroy(): void {
      this.host.jqxExpander('destroy');
   }

   enable(): void {
      this.host.jqxExpander('enable');
   }

   expand(): void {
      this.host.jqxExpander('expand');
   }

   focus(): void {
      this.host.jqxExpander('focus');
   }

   getContent(): string {
      return this.host.jqxExpander('getContent');
   }

   getHeaderContent(): string {
      return this.host.jqxExpander('getHeaderContent');
   }

   invalidate(): void {
      this.host.jqxExpander('invalidate');
   }

   refresh(): void {
      this.host.jqxExpander('refresh');
   }

   render(): void {
      this.host.jqxExpander('render');
   }

   setHeaderContent(headerContent: string): void {
      this.host.jqxExpander('setHeaderContent', headerContent);
   }

   setContent(content: string): void {
      this.host.jqxExpander('setContent', content);
   }


   // jqxExpanderComponent events
   @Output() onCollapsing = new EventEmitter();
   @Output() onCollapsed = new EventEmitter();
   @Output() onExpanding = new EventEmitter();
   @Output() onExpanded = new EventEmitter();

   __wireEvents__(): void {
      this.host.on('collapsing', (eventData: any) => { this.onCollapsing.emit(eventData); });
      this.host.on('collapsed', (eventData: any) => { this.onCollapsed.emit(eventData); });
      this.host.on('expanding', (eventData: any) => { this.onExpanding.emit(eventData); });
      this.host.on('expanded', (eventData: any) => { this.onExpanded.emit(eventData); });
   }

} //jqxExpanderComponent


