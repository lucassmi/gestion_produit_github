install the KVM2 driver, first install and configure the prereqs:

$ sudo apt install libvirt-bin libvirt-daemon-system qemu-kvm

$ sudo systemctl enable libvirtd.service
$ sudo systemctl start libvirtd.service
$ sudo systemctl status libvirtd.service

$ sudo usermod -a -G libvirt $(whoami)

$ newgrp libvirt

$ curl -LO https://storage.googleapis.com/minikube/releases/latest/docker-machine-driver-kvm2 \ && sudo install docker-machine-driver-kvm2 /usr/local/bin/

To use the kvm2 driver:

$ minikube start --vm-driver kvm2

and run minikube as usual:

minikube start
