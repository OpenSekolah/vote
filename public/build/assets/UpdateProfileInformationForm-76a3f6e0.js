import{T as U,d as f,o as d,c as w,w as a,g as r,e as S,a as l,b as o,m as p,v,B as j,S as _,f as h,u as t,i as E,n as R,R as A}from"./app-470e78aa.js";import{_ as F}from"./ActionMessage-3bfea874.js";import{_ as T}from"./FormSection-ac47b6b7.js";import{_ as g}from"./InputError-b7390d0b.js";import{_ as k}from"./InputLabel-2500ee2e.js";import{_ as z}from"./PrimaryButton-f3d723bc.js";import{_ as V}from"./SecondaryButton-93c9f12f.js";import{_ as C}from"./TextInput-e6b309d2.js";import"./SectionTitle-a6d2ebaa.js";import"./_plugin-vue_export-helper-c27b6911.js";const D={key:0,class:"col-span-6 sm:col-span-4"},L={class:"mt-2"},O=["src","alt"],M={class:"mt-2"},Y={class:"col-span-6 sm:col-span-4"},q={class:"col-span-6 sm:col-span-4"},G={key:0},H={class:"text-sm mt-2"},J={class:"mt-2 font-medium text-sm text-green-600"},le={__name:"UpdateProfileInformationForm",props:{user:Object},setup(m){const y=m,e=U({_method:"PUT",name:y.user.name,email:y.user.email,photo:null}),b=f(null),c=f(null),n=f(null),$=()=>{n.value&&(e.photo=n.value.files[0]),e.post(route("user-profile-information.update"),{errorBag:"updateProfileInformation",preserveScroll:!0,onSuccess:()=>P()})},x=()=>{b.value=!0},I=()=>{n.value.click()},N=()=>{const s=n.value.files[0];if(!s)return;const i=new FileReader;i.onload=u=>{c.value=u.target.result},i.readAsDataURL(s)},B=()=>{A.delete(route("current-user-photo.destroy"),{preserveScroll:!0,onSuccess:()=>{c.value=null,P()}})},P=()=>{var s;(s=n.value)!=null&&s.value&&(n.value.value=null)};return(s,i)=>(d(),w(T,{onSubmitted:$},{title:a(()=>[r(" Profile Information ")]),description:a(()=>[r(" Update your account's profile information and email address. ")]),form:a(()=>[s.$page.props.jetstream.managesProfilePhotos?(d(),S("div",D,[l("input",{ref_key:"photoInput",ref:n,type:"file",class:"hidden",onChange:N},null,544),o(k,{for:"photo",value:"Photo"}),p(l("div",L,[l("img",{src:m.user.profile_photo_url,alt:m.user.name,class:"rounded-full h-20 w-20 object-cover"},null,8,O)],512),[[v,!c.value]]),p(l("div",M,[l("span",{class:"block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center",style:j("background-image: url('"+c.value+"');")},null,4)],512),[[v,c.value]]),o(V,{class:"mt-2 mr-2",type:"button",onClick:_(I,["prevent"])},{default:a(()=>[r(" Select A New Photo ")]),_:1},8,["onClick"]),m.user.profile_photo_path?(d(),w(V,{key:0,type:"button",class:"mt-2",onClick:_(B,["prevent"])},{default:a(()=>[r(" Remove Photo ")]),_:1},8,["onClick"])):h("",!0),o(g,{message:t(e).errors.photo,class:"mt-2"},null,8,["message"])])):h("",!0),l("div",Y,[o(k,{for:"name",value:"Name"}),o(C,{id:"name",modelValue:t(e).name,"onUpdate:modelValue":i[0]||(i[0]=u=>t(e).name=u),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),o(g,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),l("div",q,[o(k,{for:"email",value:"Email"}),o(C,{id:"email",modelValue:t(e).email,"onUpdate:modelValue":i[1]||(i[1]=u=>t(e).email=u),type:"email",class:"mt-1 block w-full",autocomplete:"username"},null,8,["modelValue"]),o(g,{message:t(e).errors.email,class:"mt-2"},null,8,["message"]),s.$page.props.jetstream.hasEmailVerification&&m.user.email_verified_at===null?(d(),S("div",G,[l("p",H,[r(" Your email address is unverified. "),o(t(E),{href:s.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",onClick:_(x,["prevent"])},{default:a(()=>[r(" Click here to re-send the verification email. ")]),_:1},8,["href","onClick"])]),p(l("div",J," A new verification link has been sent to your email address. ",512),[[v,b.value]])])):h("",!0)])]),actions:a(()=>[o(F,{on:t(e).recentlySuccessful,class:"mr-3"},{default:a(()=>[r(" Saved. ")]),_:1},8,["on"]),o(z,{class:R({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:a(()=>[r(" Save ")]),_:1},8,["class","disabled"])]),_:1}))}};export{le as default};
